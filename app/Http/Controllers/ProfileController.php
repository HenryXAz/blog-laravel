<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
  
  public function index() {
    return view('profile.index');
  }

  public function update(Request $request) {
    $validator = Validator::make($request->all(), [
      'new_password' => 'confirmed',
      'password' => 'required',
    ]);

    if($validator->fails()) {
      return redirect(route('profile.index'))->withErrors($validator->errors());
    }

    $email = $request->email ?? '';
    $password = ($request->has('password')) ? $request->password : '';  
    $user = User::where('email', '=', $email)->get()->first();

    if($user && Auth::user()->email !== $user->email) {
      return redirect(route('profile.index'))->withErrors(['user_exists' => 'the new email alredy exists*']);
    }

    if(!Auth::validate(['email' => Auth::user()->email, 'password' => $password])) {
      return redirect(route('profile.index'))->withErrors(['user_not_found' => 'user does not exists or credentials are incorrect*']);
    }


    $user->name = ($request->has('name')) ? $request->name : $user->name;
    $user->email = ($request->has('email')) ? $request->email : $user->email;
    $user->password = ($request->has('new_password') && strlen( $request->new_password) >= 6 ) ? Hash::make($request->new_password) : $user->password;
    $user->save();

    return redirect(route('profile.index'))->with('user_updated', 'your profile information was updated successfully');
  }
}
