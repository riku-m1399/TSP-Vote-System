<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    private $result;
    private $poll;
    private $user;

    public function __construct(Result $result, Poll $poll, User $user)
    {
        $this->result = $result;
        $this->poll = $poll;
        $this->user = $user;
    }

    public function store(Request $request, $poll_id)
    {
        $request->validate([
            'answer' => 'required'
        ]);

        $this->result->poll_id = $poll_id;
        $this->result->user_id = Auth::user()->id;
        $this->result->answer = $request->answer;
        $this->result->save();

        return back();
    }

    public function show($poll_id)
    {
        $all_results = $this->result->where('poll_id', $poll_id)->get();
        $poll = $this->poll->findOrFail($poll_id);
        return view('results.show')->with('all_results', $all_results)->with('poll', $poll);
    }

    public function delete($poll_id)
    {
        $this->result->where('poll_id', $poll_id)->delete();
        return redirect()->back();
    }
}
