@if (count($tags))
  <h3 class="list-group-item list-group-item-success">Tags</h3>
  <div class="card">
    <div class="row">

      @if (! empty(old('tags')))
        @for ($i = 0; $i < sizeOf($tags); $i++)
          <label class="btn btn-outline-success btn-space">{{ $tags[$i]->name }} <input type="checkbox" name="tags[]" class="badgebox" value="{{ $tags[$i]->id }}" @if (in_array($tags[$i]->id, old('tags'))) checked @endif></label>
        @endfor

        @else
          @for ($i = 0; $i < sizeOf($tags); $i++)
            <label class="btn btn-outline-success btn-space">{{ $tags[$i]->name }} <input type="checkbox" name="tags[]" class="badgebox" value="{{ $tags[$i]->id }}"></label>
          @endfor

      @endif


    </div>
  </div>
@endif
