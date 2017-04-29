@if (count($post->tags))
  <hr>
  <h3 class="list-group-item list-group-item-success">Tags</h3>
  <div class="card">
    <div class="row">
      @foreach ($post->tags as $tag)
        <a class="btn btn-outline-success btn-space" href="/posts/tags/{{ $tag->name }}">
          {{ $tag->name }}
        </a>
      @endforeach
    </div>
  </div>
@endif
