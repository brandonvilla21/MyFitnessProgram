<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function profile()
  {
    $user = Auth::user();
    return view('users.profile', compact('user'));
  }

  public function updateAvatar(Request $request)
  {
    if (request()->hasFile('avatar')) {
      $avatar = request()->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
      })->save( public_path('/uploads/avatars/') . $filename);

      $user = Auth::user();
      $user->avatar = $filename;
      $user->save();

      return view('users.profile', compact('user'));
    }
  }
}
