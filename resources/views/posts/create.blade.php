@extends('layouts.master')

@section('content')
  <div class="col-sm-8 container">

    <h2 class="text-center">Publish a routine</h2>
    <hr />
    <form method="POST" action="{{ route('post_store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
      </div>
      <hr>
      <div class="form-group">
        <label for="body">Body:</label>
        <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
      </div>
      <hr>

      <div class="form-group">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Routine for: </label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineForm" name="routine_for">
          <option value="">Choose...</option>
          <option value="Women" {{ old('routine_for') == "Women"  ? 'selected' : '' }}>Women</option>
          <option value="Men" {{ old('routine_for') == "Men"  ? 'selected' : '' }}>Men</option>
          <option value="Both" {{ old('routine_for') == "Both"  ? 'selected' : '' }}>Both</option>
        </select>

        <label class="mr-sm-2" for="inlineFormCustomSelect">Difficulty level: </label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="difficulty_level">
          <option value="">Choose...</option>
          <option value="Beginner" {{ old('difficulty_level') == "Beginner"  ? 'selected' : '' }}>Beginner</option>
          <option value="Intermediate" {{ old('difficulty_level') == "Intermediate"  ? 'selected' : '' }}>Intermediate</option>
          <option value="Advanced" {{ old('difficulty_level') == "Advanced"  ? 'selected' : '' }}>Advanced</option>
        </select>
      </div>
      <hr>

      <div class="form-group">
        <label>Body part(s): </label>
        <div class="form-check">
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Chest" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Chest", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Chest
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Back" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Back", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Back
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Legs" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Legs", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Legs
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Calves" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Calves", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Calves
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Shoulders" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Shoulders", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Shoulders
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Biceps" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Biceps", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Biceps
          </label>
          <label class="form-check-label pr-3">
            <input name="body_parts[]" value="Triceps" type="checkbox" class="form-check-input"
            @if (! empty(old('body_parts')))
            {{ (in_array("Triceps", old('body_parts')) ? 'checked' : '') }}
            @endif
            >
            Triceps
          </label>
        </div>
        <hr>

      </div>
      <div class="form-group">
        <label for="image">Post image:</label>
        <input type="file" name="photo" class="form-control">

        @if (! empty(old()))
          <div class="warning alert-warning">
            <ul>
              <li>Please, reselected your image if you have selected one before.</li>
            </ul>
          </div>
        @endif

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
    <script src="{{ URL::to('js/tinymce_config_edit.js') }}"></script>﻿

  </div>
@endsection
