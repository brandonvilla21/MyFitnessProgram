@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <img class="img-avatar" src="/uploads/avatars/{{ $user->avatar }}" />
        <h2>{{ $user->name }}'s Profile</h2>
        <form enctype="multipart/form-data" action="/profile" class="form-group" role="form" method="POST">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-block">
              <div class="form-group">
                <label for="update">Update profile avatar:</label>
                <input type="file" name="avatar">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
              </div>
            </div>

          </div>
          {{-- <input type="hidden" name"_token" value="{{ csrf_token() }}"> --}}
        </form>
      </div>
    </div>
  </div>
@endsection
