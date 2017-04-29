@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
        <h3 class="text-primary title-padding-bottom">{{ $user->name }}'s Profile</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="row pb-3">
          <div class="col-lg-12">
            <img class="img-avatar img-responsive img-fluid" src="/uploads/avatars/{{ $user->avatar }}" />
          </div>
        </div>


        <div class="col-lg-12">
          <form enctype="multipart/form-data" action="/profile" class="form-group" role="form" method="POST">
            {{ csrf_field() }}
            <input type="file" name="avatar" class="form-group">
            <input type="submit" class="pull-right btn btn-sm btn-primary">
            @include('layouts.errors')
          </form>
        </div>

      </div>
      <div class="col-md-1">
      </div>
      <div class="col-md-7">
        <h3>Your posts:</h3>
        <div class="list-group pb-3">
          @foreach ($user->posts as $post)
            <a href="/posts/{{ $post->id }}" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small>{{ $post->created_at->diffForHumans() }}</small>
              </div>
              <p class="mb-1">{{ $preview = substr($post->body, 0, 100) . '...' }}</p>
              <small>{{ $post->body_parts }}</small>
            </a>
          @endforeach
        </div>
        <a class="pull-right btn btn-primary"href="posts/create">Publish a routine</a>
      </div>
    </div>


  </div>
@endsection
