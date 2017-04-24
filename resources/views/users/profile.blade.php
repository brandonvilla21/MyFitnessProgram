@extends('layouts.master')

@section('content')
  <div class="container card-block">
    <h3 class="list-group-item list-group-item-success">{{ $user->name }}'s Profile</h3>
    <div class="card-block">
      <img class="img-avatar" src="/uploads/avatars/{{ $user->avatar }}" />
      <form enctype="multipart/form-data" action="/profile" class="form-group" role="form" method="POST">
        {{ csrf_field() }}
        <div class="container">
          <h3 for="update">Update profile avatar:</h3>
          <input type="file" name="avatar">
          <input type="submit" class="pull-right btn btn-sm btn-primary">
        </div>
        <hr>
        <div class="card-block">
          <div class="card">
            <h3 class="list-group-item list-group-item-info" for="update">Rutine section:</h3>
            <ul class="list-group">
              <li class="list-group-item">
                <a href="posts/create">Publish a routine</a><span class="badge">12</span>
              </li>
            </ul>
          </div>



        </div>


        {{-- <input type="hidden" name"_token" value="{{ csrf_token() }}"> --}}
      </form>
    </div>

  </div>
@endsection
