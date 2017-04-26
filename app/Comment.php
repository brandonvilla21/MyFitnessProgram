<?php

namespace App;

class Comment extends Model
{

    protected $fillable = ['post_id', 'user_id', 'body'];

    public function post()
    {
      return $this->belongsTo(Post::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
