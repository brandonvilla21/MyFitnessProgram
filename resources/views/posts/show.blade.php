@extends('layouts.master')

@section('content')

  <div class="col-sm-8 container">

    <h1 class="text-center h3"> {{ $post->title }}</h1>
    <hr>
    <div class="form-group">
      <img class="img-show img-fluid rounded mx-auto d-block" src="/uploads/posts/{{$post->image }}" alt="Generic placeholder image" width="400">
      <span class="glyphicon glyphicon-time"></span><h6 class="small comment-meta text-center">Posted by<a href="#"> {{ $post->user->name }}</a> | {{ $post->created_at->diffForHumans() }}</h6>
      <hr >
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="list-group">
              <a href="#" class=" list-group-item active">Routine information</a>
              <a class="text-muted list-group-item">Routine for: {{ $post->routine_for }}</a>
              <a class="text-muted list-group-item">Difficulty level: {{ $post->difficulty_level }}</a>
              <a class="text-muted list-group-item">Body parts: {{ $post->body_parts }}</a>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="show-post img-fluid">
        {!! $post->body !!}
      </div>
    </div>

    <hr>
    <br>
    <h3 class="m-b-2">Comments</h3>
    @foreach ($post->comments as $comment)

      @include('layouts.comments')
      <hr>
    @endforeach

    {{-- Add a comment --}}

    <hr>

    @if (Auth::check())
      <div class="card">

        <div class="card-block">

          <form method="POST" action="/posts/{{ $post->id }}/comments">
            {{ csrf_field() }}

            <div class="form-group">
              <textarea name="body" placeholder="Type your comment here..." class="form-control" required></textarea>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add comment</button>
            </div>

          </form>

          @include('layouts.errors')
        </div>
      </div>

    @endif

    @include('posts.tags')

  </div>


@endsection
