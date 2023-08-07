<?php

use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
  Route::get('', [UserManagementController::class, 'index'])->name('users.index');
  Route::post('', [UserManagementController::class, 'store'])->name('users.store');
  Route::get('edit/{user}', [UserManagementController::class, 'edit'])->name('users.edit');
  Route::post('update', [UserManagementController::class, 'update'])->name('users.update');
  Route::get('delete/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});
