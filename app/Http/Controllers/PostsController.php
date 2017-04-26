<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;
use Image;


class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }


  public function index(Posts $posts)
  {
    $posts = Post::latest()
    ->filter(request(['month', 'year']))
    ->get();

    //$posts = $posts->all();

    return view('posts.index', compact('posts'));
  }


  public function show(Post $post)
  {
    return view('posts.show', compact('post'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|max:60',
      'body' => 'required',
      'photo' => 'image'
    ]);

    //Manipulate the image
    $filename = "default.jpg";

    if ($request->hasFile('photo')) {
      $post_image = $request->file('photo');
      $filename = time() . '.' . $post_image->getClientOriginalExtension();

      Image::make($post_image)->resize(1000, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      })->save( public_path('/uploads/posts/') . $filename);

    }

    //
    $post = new Post(request(['title', 'body', 'image']));
    $post->image = $filename;


    //Add the post slug to the post object
    auth()->user()->publish($post);


    //And then redirect to the homepage.
    return redirect('/');
  }

}
