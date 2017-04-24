@extends('layouts.master')

@section('content')
  @include('layouts.carousel')

  <div class="container marketing card-block">
    <div class="row">

      @foreach ($posts as $post)
          @include('posts.post')
      @endforeach

      {{-- <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav> --}}

    </div><!-- /.blog-main -->

  </div>

@endsection
