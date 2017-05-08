<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tag;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
      return $this->hasMany(Post::class);
    }

    public function publish(Post $post, $tags)
    {
      $this->posts()->save($post);

      //Attaching the post with its tags.
      for ($i=0; $i < sizeOf($tags); $i++) {
        $tag = Tag::where('id', $tags[$i])->first();
        $post->tags()->attach($tag);
      }

      // Post::create([
      //   'title' => request('title'),
      //   'body' => request('body'),
      //   'user_id' => auth()->id()
      // ]);
    }

    public function edit($post, $tags)
    {
      $post->update();

      //Detach the post from its tags.
      $post->tags()->detach();

      //Attaching the post with its tags.
      for ($i=0; $i < sizeOf($tags); $i++) {
        $tag = Tag::where('id', $tags[$i])->first();
        $post->tags()->attach($tag);
      }


    }
}
