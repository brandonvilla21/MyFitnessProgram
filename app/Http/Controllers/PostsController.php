<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;
use Image;
use App\Http\Controllers\Session;

class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }


  public function index(Posts $posts)
  {
    // $posts = Post::latest()
    // ->filter(request(['month', 'year']))
    // ->get();

    $posts = Post::latest()->paginate(6);

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
      'title'             => 'required|max:60',
      'body'              => 'required',
      'routine_for'       => 'required',
      'difficulty_level'  => 'required',
      'body_parts'        => 'required',
      'photo'             => 'image|mimes:jpeg,bmp,png|max:5120'
    ]);

    // dd($request->content);

    //Convert array to string
    $body_partsString = implode(', ', $request->body_parts);

    //Manipulate the image
    $filename = $this->getRandomDefaultImage();
    // $filename = "default.jpg";

    if ($request->hasFile('photo')) {
      $post_image = $request->file('photo');
      $filename = time() . '.' . $post_image->getClientOriginalExtension();

      Image::make($post_image)->resize(1000, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      })->save( public_path('/uploads/posts/') . $filename);

    }

    //
    $post = new Post(request(['title', 'body', 'routine_for', 'difficulty_level', 'body_parts', 'image']));
    $post->image = $filename;
    $post->body_parts = $body_partsString;

    //Getting the tags in a variable.
    $tags = $request->tags;

    auth()->user()->publish($post, $tags);


    //And then redirect to the homepage.
    return redirect('/');
  }

  public function edit(Post $post)
  {
    return view('posts.edit', compact('post'));
  }

  public function update(Post $post, Request $request)
  {
    $this->validate($request, [
      'title'             => 'required|max:60',
      'body'              => 'required',
      'routine_for'       => 'required',
      'difficulty_level'  => 'required',
      'body_parts'        => 'required',
      'photo'             => 'image|mimes:jpeg,bmp,png|max:5120'
    ]);

    // dd($request->content);

    //Convert array to string
    $body_partsString = implode(', ', $request->body_parts);

    //Manipulate the image
    $filename = $post->image;

    if($this->isDefaultImage($filename) == false)//If false, the old image will be deleted.
    {
      \File::delete( public_path('/uploads/posts/') . $filename);
    }

    if ($request->hasFile('photo')) {
      $post_image = $request->file('photo');
      $filename = time() . '.' . $post_image->getClientOriginalExtension();
      Image::make($post_image)->resize(1000, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      })->save( public_path('/uploads/posts/') . $filename);
    }

    //$post = new Post(request(['title', 'body', 'routine_for', 'difficulty_level', 'body_parts', 'image']));
    $post->title = $request->title;
    $post->body  = $request->body;
    $post->routine_for = $request->routine_for;
    $post->difficulty_level = $request->difficulty_level;
    $post->body_parts = $body_partsString;
    $post->image = $filename;

    //Getting the tags in a variable.
    $tags = $request->tags;

    auth()->user()->edit($post, $tags);
    session()->flash('message', 'Your post was successfully updated :D');


    //And then redirect to the homepage.
    return redirect('/');
  }

  public function destroy(Post $post)
  {

    $post->delete();
    // Session::flash('message', 'Post has been deleted succesfully');

    return redirect('/');
  }

  public function getRandomDefaultImage()
  {
    $array = ["default.jpg","default1.jpg","default2.jpg","default3.jpg","default4.jpg","default5.jpg","default6.jpg","default7.jpg"];
    $random = $array[mt_rand(0, count($array) - 1)];
    return $random;
  }

  public function isDefaultImage($filename)
  {
    $array = ["default.jpg","default1.jpg","default2.jpg","default3.jpg","default4.jpg","default5.jpg","default6.jpg","default7.jpg"];
    return in_array($filename, $array);
  }

}
