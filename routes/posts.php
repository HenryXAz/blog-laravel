<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "auth"], function () {
  Route::get("", [PostController::class, "index"])->name("posts.index");
  Route::post("", [PostController::class, "store"])->name("posts.store");
  Route::get("edit/{post}", [PostController::class, "edit"])->name("posts.edit");
  Route::post("update", [PostController::class, "update"])->name("posts.update");
  Route::get("delete/{post}", [PostController::class, "destroy"])->name("posts.destroy");
});
