@if (count($tags))
  <div class="row">
    @for ($i = 0; $i < sizeOf($tags); $i++)
      <label class="btn btn-outline-success btn-space">{{ $tags[$i]->name }} <input type="checkbox" name="tags[]" class="badgebox" value="{{ $tags[$i]->id }}"></label>
    @endfor
  </div>
@endif
