<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  
  public function register(Request $request) {
    $validator = Validator::make($request->all(), [
      'name' => 'required|min:2',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed'
    ], [
      'name.required' => 'el nombre es requerido*',
      'name.min' => 'el nombre debe contener un mínimo de 2 caracteres',
      'email.required' => 'el email es requerido*',
      'email.email' => 'ingrese un email válido*',
      'password.required' => 'la contraseña es requerida*',
      'password.min' => 'la contraseña debe contener un mínimo de 6 caracteres*',
      'password.confirmed' => 'la contraseña debe ser confirmada o no coincide*',
    ]);
    
    if($validator->fails()) {
      
    }

  }

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

    $credentials = [
      'email' => $request->email,
      'password' => $request->password,
    ];

    if(Auth::attempt($credentials, false)) {
      request()->session()->regenerate(); 
      return redirect(route('dashboard.index'));  
    }

    return redirect(route('auth.login.view'))->withErrors([
      'login_failed' => 'credenciales incorrectas o usuario no existe*',
    ]);
  }

  public function logout() 
  {
    Auth::logout();
    request()->session()->regenerate();

    return redirect(route('auth.login.view'));
  }  
}
