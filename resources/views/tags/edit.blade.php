@if (count($tags))
  <h3 class="list-group-item list-group-item-success">Tags</h3>
  <div class="card">
    <div class="row">
      @php
        $tag_names = $post->tags->pluck('name')->toArray()
      @endphp

      @for ($i = 0; $i < sizeOf($tags); $i++)
        <label class="btn btn-outline-success btn-space">{{ $tags[$i]->name }} <input type="checkbox" name="tags[]" class="badgebox" value="{{ $tags[$i]->id }}" @if (in_array($tags[$i]->name, $tag_names)) checked @endif></label>
      @endfor
    </div>
  </div>
@endif
