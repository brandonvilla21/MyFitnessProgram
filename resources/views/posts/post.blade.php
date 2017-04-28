<div class="col-lg-5 card card-margin">
  <div class="crop">
    <img class="card-img-top img-responsive" src="/uploads/posts/{{$post->image }}" alt="{{$post->title }}">
  </div>
  <span class="glyphicon glyphicon-time"></span><h6 class="small comment-meta text-center">Posted by<a href="#"> {{ $post->user->name }}</a> | {{ $post->created_at->diffForHumans() }}</h6>
  <div class="card card-outline-secondary mb-3 text-center">
    <div class="text-center">
      <h4 class="card-header">{{$post->title }}</h4>
      <p class="text-justify">{{ $preview = substr($post->body, 0, 100) . '...'}}</p>
      <a href="/posts/{{ $post->id }}"class="btn btn-success btn-space-top">See post</a>
    </div>
  </div>
</div>
