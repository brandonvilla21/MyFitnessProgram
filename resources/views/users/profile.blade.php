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
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small>Donec id elit non mi porta.</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
        </div>
        <a class="pull-right btn btn-primary"href="posts/create">Publish a routine</a>
      </div>
    </div>


  </div>
@endsection
