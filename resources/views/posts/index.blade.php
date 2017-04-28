@extends('layouts.master')

@section('content')
  @include('layouts.carousel')

  <div class="container">
    <div class="row">
      @foreach ($posts as $post)
          @include('posts.post')
      @endforeach
    </div>
  </div>

@endsection
