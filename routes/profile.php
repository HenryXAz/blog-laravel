<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
  Route::get('', [ProfileController::class, 'index'])->name('profile.index');
  Route::post('', [ProfileController::class, 'update'])->name('profile.update');
});
