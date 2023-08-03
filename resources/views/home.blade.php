@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="container w-50 mx-auto mt-5">
    <h1 class="text-center display-3 fw-bold">TSP Vote System</h1>
    <p class="mt-5 text-center">
      Choose the event which you participate in. <br>
      <span class="text-muted">(参加するイベントを選択してください)</span>
    </p>
  </div>
  <table class="table mt-5 w-50 mx-auto">
    <thead class="table-dark">
      <tr>
        <th class="fw-bold text-center">Title</th>
        <th class="fw-bold text-center">Results</th>
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
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection