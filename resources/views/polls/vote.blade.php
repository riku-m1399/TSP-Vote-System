@extends('layouts.app')

@section('title', 'Vote')

@section('content')
    <div class="container w-75 mx-auto mt-5">
      <h1 class="text-center display-3 fw-bold">{{ $poll->title }} Vote System</h1>
      <h3 class="mt-3 text-center fw-bold">Vote Time</h3>
      <div class="text-center mx-auto mt-5">
        <p class="h3">How to vote <span class="text-muted">(投票方法)</span>
        </p>
        <p class="mt-3">
          1. Select who you think win the battle <br>
          <span class="text-muted">(あなたが勝ったと思う方を選択してください)</span>
        </p>
        <p>
          2. Click the "Vote" button <br>
          <span class="text-muted">(「Vote」ボタンを押してください)</span>
        </p>
        <p>
          ※If you cannot make your decision, please do not vote for anyone <br>
          <span class="text-muted">(ドローの場合は投票しないでください)</span>
        </p>
      </div>
      
      <form action="{{ route('result.store', $poll->id) }}" method="post" class="mt-5 mb-5 w-100 mx-auto">
        @csrf
        <div class="card bg-dark">
          <div class="card-header">
            <p class="text-center text-warning mt-3">{{ $poll->title }}</p>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">

                <div class="col text-center">
                  <input type="radio" name="answer" id="answer_A" value="A" style="display:none;" class="btn-check">
                  <label for="answer_A" class="btn btn-outline-warning w-100">
                    <img src="{{ asset('/storage/images/TspVoteSystem_sideA.jpg') }}" alt="TspVoteSystem_sideA" class="img-fluid w-100 rounded">
                  </label>
                </div>

                <div class="col text-center">
                  <input type="radio" name="answer" id="answer_B" value="B" style="display:none;" class="btn-check">
                  <label for="answer_B" class="btn btn-outline-warning w-100">
                    <img src="{{ asset('storage/images/TspVoteSystem_sideB.jpg') }}" alt="TspVoteSystem_sideB" class="img-fluid w-100 rounded">
                  </label>
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer text-center mt-3 mb-5">
            <button type="submit" class="btn btn-danger btn-lg text-dark">Vote</button>
          </div>
        </div>
      </form>

    </div>
@endsection