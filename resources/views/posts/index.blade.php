@extends('layouts.master')

@section('content')
  @include('layouts.carousel')

  <div class="container">
    <div class="row">
      @foreach ($posts as $post)
          @include('posts.post')
      @endforeach
    </div>

    <div class="container">
      {{ $posts->render('vendor.pagination.bootstrap-4') }}
    </div>


  </div>

  <div class="container">
    @include('layouts.feature')

  </div>

@endsection
