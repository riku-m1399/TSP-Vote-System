<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Poll;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    private $poll;
    private $result;

    public function __construct(Poll $poll, Result $result)
    {
        $this->poll = $poll;
        $this->result = $result;
    }

    public function index()
    {
        $all_poll = $this->poll->latest()->get();
        $user = Auth::user();
        if($user->role_id == '1'){
            return view('polls.dashboard')->with('all_poll', $all_poll);
        }else{
            return view('polls.index')->with('all_poll', $all_poll);
        }
    }

    public function show($poll_id)
    {
        $poll = $this->poll->findOrFail($poll_id);
        $user_id = Auth::user()->id;
        if(DB::table('results')->where('user_id', $user_id)->where('poll_id', $poll_id)->exists()){
            return view('polls.voted')->with('poll', $poll);
        }else{
            return view('polls.vote')->with('poll', $poll);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1'
        ]);

        $this->poll->title = $request->title;
        $this->poll->save();

        return redirect()->back();
    }

    public function announce($poll_id)
    {
        $poll = $this->poll->findOrFail($poll_id);
        $num_A = DB::table('results')->where('poll_id', $poll_id)->where('answer', 'A')->count();
        $num_B = DB::table('results')->where('poll_id', $poll_id)->where('answer', 'B')->count();

        return view('polls.announce')->with('num_A', $num_A)->with('num_B', $num_B)->with('poll', $poll);
    }

    public function delete($poll_id)
    {
        $poll = $this->poll->findOrFail($poll_id);
        return view('polls.deletePoll')->with('poll', $poll);
    }

    public function destroy($poll_id, Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);
        if($request->password == "dasoul971"){
            $this->result->where('poll_id',$poll_id)->delete();
            $this->poll->destroy($poll_id);
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('flash_message_incorrect', 'Incorrect Password');
        }
    }
}
