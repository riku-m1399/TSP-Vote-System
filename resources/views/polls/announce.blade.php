@extends('layouts.app')

@section('title', 'Announce')

@section('content')
  <div class="container w-75 mx-auto mt-5">
    <h1 class="text-center display-3 fw-bold">{{ $poll->title }} Vote System</h1>
    <h3 class="text-center mt-3 fw-bold">Result</h3>
    <div class="container w-50 mx-auto mt-5 text-center">
      <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#judgement"><i class="fa-solid fa-gavel"></i> Judgement</button>
      @include('polls.modal.judgement')
    </div>
  </div>
@endsection