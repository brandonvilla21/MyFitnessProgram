@extends('layouts.master')

@section('content')

  @php
    $user_posts = App\Post::where('user_id', $user->id)->latest()->paginate(2);
  @endphp

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
            <img class="img-avatar img-responsive img-fluid preview" src="/uploads/avatars/{{ $user->avatar }}" />
          </div>
        </div>


        <div class="col-lg-12">
          <form enctype="multipart/form-data" action="/profile" class="form-group" role="form" method="POST">
            {{ csrf_field() }}
            <input type="file" name="avatar" class="form-group" onchange="loadPreview(this)">
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
          @foreach ($user_posts; as $post)
            <div class="card">
              {{-- <a href="{{ route('post_show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start"> --}}
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small>{{ $post->created_at->diffForHumans() }}</small>
              </div>
              <small>{{ $post->body_parts }}</small>

              <div class="btn-center">
                <a href="{{ route('post_show', $post->id) }}" class="col-md-10 mt-2 btn btn-success">See post</a>

                <a href="{{ route('post_edit', $post->id) }}" class="col-md-10 mt-2 btn btn-info">Edit post</a>

                {{-- {{ Form::open(array('route' => array('post_destroy', $post->id), 'method' => 'delete')) }} --}}
                {{ Form::open(array('url' => 'posts/' . $post->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}

                <button type="submit" class="col-md-10 mt-2 btn btn-danger">Delete post</button>

                {{ Form::close() }}

              </div>

            </div>
          @endforeach

          <div class="container">
            {{ $user_posts->links('vendor.pagination.bootstrap-4') }}
          </div>

        </div>
        <a class="pull-right btn btn-primary"href="posts/create">Publish a routine</a>
      </div>
    </div>


  </div>
@endsection
