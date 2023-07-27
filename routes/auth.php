<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::view('', 'auth/login')->name('auth.login.view');
Route::post('', [AuthController::class, 'login'])->name('auth.login.post');
