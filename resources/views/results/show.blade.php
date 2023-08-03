@extends('layouts.app')

@section('title', 'Show Results')
    
@section('content')
  <div class="container w-50 mx-auto mt-5">
    <h1 class="text-center display-3 fw-bold">{{ $poll->title }}</h1>
    <h3 class="text-center mt-5">All Answers</h3>
  </div>
  <table class="table mt-5 w-50 mx-auto">
    <thead class="table-dark">
      <tr>
        <th class="fw-bold text-center">User</th>
        <th class="fw-bold text-center">Answer</th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($all_results as $result)
        <tr>
          <td class="fw-bold text-center">{{ $result->user->name }}</td>
          <td class="fw-bold text-center">{{ $result->answer }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="container w-50 mx-auto mt-5">
    <button type="button" class="btn btn-outline-warning btn-lg" data-bs-toggle="modal" data-bs-target="#deleteAnswers"><i class="fa-solid fa-trash"></i> Reset the poll</button>
    @include('results.modal.deleteAnswers')
  </div>
@endsection