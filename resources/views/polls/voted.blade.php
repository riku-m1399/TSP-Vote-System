@extends('layouts.app')

@section('title', 'Voted')

@section('content')
<div class="container w-75 mx-auto mt-5">
  <h1 class="text-center display-3 fw-bold">{{ $poll->title }} Vote System</h1>
  <h3 class="mt-5 text-center">Please wait for the result announced...</h3>
  <div class="text-center mx-auto mt-5">
    <p class="mt-3">
      Your vote has been accepted. Thank you for taking part! <br>
      <span class="text-muted">(投票が完了しました。ご参加いただきありがとうございます！)</span>
    </p>
  </div>
  
</div>
@endsection