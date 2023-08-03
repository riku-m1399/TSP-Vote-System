@extends('layouts.app')

@section('title', 'Delete Poll')
    
@section('content')
    @if (session('flash_message_incorrect'))
      <div class="alert alert-danger text-center">
        <i class="fa-sharp fa-solid fa-circle-exclamation"></i> {{ session('flash_message_incorrect') }}
      </div>
    @endif
    <div class="card w-50 mx-auto mt-5">
      <div class="card-header">
        <h5 class="card-title">Delete the poll</h5>
      </div>
      <div class="card-body">
        <p>
          Do you really want to delete the poll '{{ $poll->title }}'? <br>
          <span class="text-muted">(本当に「{{ $poll->title }}」を消去しますか？)</span>
        </p>
      </div>
      <div class="card-footer">
        <form action="{{ route('poll.destroy', $poll->id) }}" method="post">
          @csrf
          @method('DELETE')
          <div class="container">
            <div class="row mt-3">
              <div class="col-3">
                <label for="password" class="form-label">Password</label>
              </div>
              <div class="col-9">
                <input type="password" name="password" class="form-control" autofocus>
              </div>
              @error('password')
                <p class="text-danger small">{{ $message }}</p>
              @enderror
            </div>
            <div class="row mt-4">
              <div class="col text-end">
                <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-danger btn-lg text-dark"><i class="fa-solid fa-trash"></i> Delete the poll</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection