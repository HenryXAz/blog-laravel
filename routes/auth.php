<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function(){
  Route::view('login', 'auth.login')->name('auth.login.view');
  Route::post('login', [AuthController::class, 'login'])->name('auth.login.post');
});


Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');