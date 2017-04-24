<div class="col-lg-4 container">
  <img class="rounded-circle" src="/uploads/avatars/{{$post->user->avatar }}" alt="Generic placeholder image" width="140">
  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">

      {{ $post->title }}

    </a>
    <hr>
    <p class="h6">
      {{ $post->user->name }} on
      {{ $post->updated_at->toFormattedDateString() }}

    </p>
    <hr>
    {{-- {{ $post->body }} --}}

  </h2>
  <p><a class="btn btn-secondary" href="/posts/{{ $post->id }}" role="button">View details &raquo;</a></p>
</div><!-- /.col-lg-4 -->
{{--





<h2 class="blog-post-title">

  <a href="/posts/{{ $post->id }}">

    {{ $post->title }}

  </a>

</h2>

<p class="blog-post-meta">
  {{ $post->user->name }} on
  {{ $post->updated_at->toFormattedDateString() }}

</p>

{{ $post->body }} --}}
