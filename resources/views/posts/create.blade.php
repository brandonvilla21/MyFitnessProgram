@extends('layouts.master')

@section('content')
  <div class="col-sm-8 container">

    <h2 class="text-center">Publish a rutine</h2>
    <hr />
    <form method="POST" action="{{ route('post_store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <hr>
      <div class="form-group">
        <label for="body">Body:</label>
        <textarea name="body" id="body" class="form-control"></textarea>
      </div>
      <hr>

      <div class="form-group">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Routine for: </label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineForm" name="routine_for">
          <option selected>Choose...</option>
          <option value="Women">Women</option>
          <option value="Men">Men</option>
          <option value="Both">Both</option>
        </select>

        <label class="mr-sm-2" for="inlineFormCustomSelect">Difficulty level: </label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="difficulty_level">
          <option selected>Choose...</option>
          <option value="Beginner">Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
        </select>
      </div>
      <hr>

      <div class="form-group">
        <label>Body part(s): </label>
        <div class="form-check">
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Chest" type="checkbox" class="form-check-input">
            Chest
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Back" type="checkbox" class="form-check-input">
            Back
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Legs" type="checkbox" class="form-check-input">
            Legs
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Calves" type="checkbox" class="form-check-input">
            Calves
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Shoulders" type="checkbox" class="form-check-input">
            Shoulders
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Biceps" type="checkbox" class="form-check-input">
            Biceps
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Triceps" type="checkbox" class="form-check-input">
            Triceps
          </label>
        </div>
        <hr>

      </div>
      <div class="form-group">
        <label for="image">Post image:</label>
        <input type="file" name="photo" class="form-control">
      </div>
      <hr>

      @include('layouts.errors')

      @include('tags.show')

      <hr>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Publish</button>
      </div>
    </form>

    <script src="{{ URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::to('js/tinymce_config.js') }}"></script>﻿

  </div>
@endsection
