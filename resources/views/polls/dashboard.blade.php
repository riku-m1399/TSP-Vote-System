@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="container w-75 mx-auto mt-5">
    <h1 class="text-center display-3 fw-bold">TSP Vote System <span class="text-danger">for Admin</span></h1>
  </div>
  <div class="mt-5 w-50 mx-auto">
    <form action="{{ route('poll.store') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-9">
          <input type="text" name="title" class="form-control" placeholder="Add new poll here...">
          @error('title')
          <p class="text-danger small">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-outline-info"><i class="fa-solid fa-plus"></i> Add</button>
        </div>
      </div>
    </form>
  </div>
  <table class="table mt-5 w-50 mx-auto">
    <thead class="table-dark">
      <tr>
        <th class="fw-bold text-center">Title</th>
        <th class="fw-bold text-center">Results</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all_poll as $poll)
        <tr>
          <td class="fw-bold text-center">{{ $poll->title }}</td>
          <td class="fw-bold text-center"><i class="fa-solid fa-users"></i> {{ count($poll->result) }}</td>
          <td class="text-center">
            <a href="{{ route('poll.show', $poll->id) }}" class="btn btn-outline-secondary btn-sm">Vote</a>
          </td>
          <td>
            <a href="{{ route('poll.announce', $poll->id) }}" class="btn btn-outline-success btn-sm">Announce</a>
          </td>
          <td>
            <a href="{{ route('result.show', $poll->id) }}" class="btn btn-outline-warning btn-sm">Answers</a>
          </td>
          <td>
            <a href="{{ route('poll.delete', $poll->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection