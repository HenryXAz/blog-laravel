<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  

  public function login(Request $request) {

    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required|min:6|confirmed'
    ], [
      'email.required' => 'el email es requerido*',
      'email.email' => 'ingrese un email válido*',
      'password.required' => 'la contraseña es requerida*',
      'password.min' => 'la contraseña debe contener un mínimo de 6 caracteres*',
      'password.confirmed' => 'la contraseña debe ser confirmada*',
    ]);

    if($validator->fails()) {
      return redirect(route('auth.login.view'))->withErrors($validator->errors());
    }

     return view(); 
  }
}
