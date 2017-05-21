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

    $this->validate($request, [
      'avatar' => 'required|image'
    ]);

    $user = Auth::user();
    $oldAvatar = $user->avatar;

    if($oldAvatar != "default.png")//It true, the old image will be deleted.
    {
      \File::delete( public_path('/uploads/avatars/') . $oldAvatar);
    }

    if (request()->hasFile('avatar')) {
      $avatar = request()->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
      })->save( public_path('/uploads/avatars/') . $filename);



      $user->avatar = $filename;
      $user->save();

      session()->flash('message', 'Your avatar was succesfully updated :)');
      return view('users.profile', compact('user'));
    }
  }
}
