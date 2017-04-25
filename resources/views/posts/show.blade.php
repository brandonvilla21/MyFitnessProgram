@extends('layouts.master')

@section('content')

  <div class="col-sm-8 container">

    <h1 class="text-center h3"> {{ $post->title }}</h1>
    <hr>
    <div class="form-group">
      <img class="img-show img-responsive rounded mx-auto d-block" src="/uploads/posts/{{$post->image }}" alt="Generic placeholder image" width="400">
      <hr>
      <blockquote>
        {{ $post->body }}
      </blockquote>

    </div>

    <hr>

    <div class="comments">

      <ul class="list-group">

        @foreach ($post->comments as $comment)

          <li class="list-group-item">

            <strong>
              {{ $comment->created_at->diffForHumans() }}: &nbsp;

            </strong>


            {{ $comment->body }}
          </li>

        @endforeach

      </ul>

    </div>

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

    @include('layouts.tags')

  </div>




@endsection
