<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
  
  public function index(): View
  {
    $users = User::all();

    return view('users.index', compact('users'));
  }

  public function store(Request $request) {
    $validator = Validator::make($request->all(), [
      'name' => 'required|min:2',
      'role' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed'
    ], [
      'name.required' => 'el nombre es requerido*',
      'name.min' => 'el nombre debe contener un mínimo de 2 caracteres',
      'email.required' => 'el email es requerido*',
      'email.email' => 'ingrese un email válido*',
      'password.required' => 'la contraseña es requerida*',
      'password.min' => 'la contraseña debe contener un mínimo de 6 caracteres*',
      'password.confirmed' => 'la contraseña debe ser confirmada*',
    ]);
    
    if($validator->fails()) {
      return redirect(route('users.index'))->withErrors(['register_failed' => 'algo falló en la creación del usuario, asegúrese de ingresar los datos correctamente*']);
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->save();


    return redirect(route('users.index'))->with('register_success', 'se registro correctamente');
  }

  public function edit(User $user) {
    return view('users.edit', compact(('user')));
  }

  public function update(Request $request) {

    $validator = Validator::make($request->all(), [
      'name' => 'min:2',
      'email' => 'email',
    ]);

    if($validator->fails()) {
      return redirect(route('users.index'))->withErrors(['update_failed' => 'falló la actualización, asegurese de ingresar campos correctos']);
    }

    $user = User::findOrFail($request->id);

    if(!$user) {
      return redirect(route('users.index'))->withErrors(['user_not_found' => 'no existe el usuario']);
    }    

    $user->name = $request->name ?? $user->name;
    $user->email = $request->email ?? $user->email;
    $user->role = $request->role ?? $user->role;    
    $user->save();

  
    return redirect(route('users.index'))->with('user_updated', 'se actualizó correctamente');
  }

  public function destroy(User $user) {
    $user->delete();
    return redirect(route('users.index'))->with('user_deleted', 'se eliminó correctamente');
  }

}
