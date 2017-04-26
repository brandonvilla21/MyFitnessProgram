<div class="container">
  <div class="row">
    <div class="comments col-md-9" id="comments">
      <!-- comment -->
      <div class="comment m-b-2 row">
        <div class="comment-avatar col-md-1 col-sm-2 text-xs-center p-r-1">
          <a href=""><img class="m-x-auto img-circle img-fluid" src="/uploads/avatars/{{ $comment->user->avatar }}" alt="avatar"></a>
        </div>
        <div class="comment-content col-md-11 col-sm-10">
          <h6 class="small comment-meta"><a href="#">{{ $comment->user->name }}</a> | {{ $comment->created_at->diffForHumans() }}</h6>
          <div class="comment-body">
            {{ $comment->body }}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
