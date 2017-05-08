@extends('layouts.master')

@section('content')

  @if ($post->id == Auth::user()->id)
    <div class="col-sm-8 container">

      <h2 class="text-center">Editing "{{ $post->title }}"</h2>
      <hr />
      <form method="POST" action="{{ route('post_update', ['post' => $post->id]) }}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">New title:</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <hr>
        <div class="form-group">
          <label for="body">Body:</label>
          <textarea name="body" class="form-control" id="body">{!! $post->body !!}</textarea>
        </div>
        <hr>

        <div class="form-group">
          <label class="mr-sm-2" for="inlineFormCustomSelect">Routine for: </label>
          <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineForm" name="routine_for">
            <option value="Women" @if ($post->routine_for == 'Women') selected @endif>Women</option>
            <option value="Men" @if ($post->routine_for == 'Men') selected @endif>Men</option>
            <option value="Both" @if ($post->routine_for == 'Both') selected @endif>Both</option>
          </select>

          <label class="mr-sm-2" for="inlineFormCustomSelect">Difficulty level: </label>
          <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="difficulty_level">
            <option value="Beginner" @if ($post->difficulty_level == 'Beginner') selected @endif>Beginner</option>
            <option value="Intermediate" @if ($post->difficulty_level == 'Intermediate') selected @endif>Intermediate</option>
            <option value="Advanced" @if ($post->difficulty_level == 'Advanced') selected @endif>Advanced</option>
          </select>
        </div>
        <hr>

        <div class="form-group">
          <label>Body part(s): </label>
          <div class="form-check">
            @php
              $bodyParts = explode(", ", $post->body_parts)
            @endphp

            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Chest" type="checkbox" class="form-check-input" @if (in_array("Chest", $bodyParts)) checked @endif>
              Chest
            </label>
            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Back" type="checkbox" class="form-check-input" @if (in_array("Back", $bodyParts)) checked @endif>
              Back
            </label>
            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Legs" type="checkbox" class="form-check-input" @if (in_array("Legs", $bodyParts)) checked @endif>
              Legs
            </label>
            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Calves" type="checkbox" class="form-check-input" @if (in_array("Calves", $bodyParts)) checked @endif>
              Calves
            </label>
            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Shoulders" type="checkbox" class="form-check-input" @if (in_array("Shoulders", $bodyParts)) checked @endif>
              Shoulders
            </label>
            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Biceps" type="checkbox" class="form-check-input" @if (in_array("Biceps", $bodyParts)) checked @endif>
              Biceps
            </label>
            <label class="form-check-label pr-3">
              <input name="body_parts[]" value="Triceps" type="checkbox" class="form-check-input" @if (in_array("Triceps", $bodyParts)) checked @endif>
              Triceps
            </label>
          </div>
          <hr>

        </div>

        <div class="card" style="margin-bottom: 1em;">
          <div class="row">
            <div class="col-md-6 container">
              <h4 class="text-center">Current image</h4>
              <img class="img-show img-fluid rounded mx-auto d-block" src="/uploads/posts/{{$post->image }}" alt="" width="400">

            </div>
            <div class="col-md-6 container">
              <h4 class="text-center">New image</h4>
              <img class="img-show img-fluid rounded mx-auto d-block preview" width="400">

            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="image">If you want a new image for your post, choose it below!</label>
          <input type="file" name="photo" class="form-control" onchange="loadPreview(this)">
        </div>
        <hr>

        @include('layouts.errors')

        @include('tags.edit')

        <hr>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Edit</button>
        </div>
      </form>

      <script src="{{ URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
      <script src="{{ URL::to('js/tinymce_config_edit.js') }}"></script>﻿

      @else
        <div class="card">
          <div class="card-header">
            Message
          </div>
          <div class="card-block">
            <h4 class="card-title">Sorry!</h4>
            <p class="card-text">You have to be the post's owner in order to edit it :(</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Return to de homepage</a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-link">More information...</a>
          </div>
        </div>

  @endif

</div>
@endsection
