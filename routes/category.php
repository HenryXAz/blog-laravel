<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "auth"], function () {
  Route::get("", [CategoryController::class, "index"])->name("category.index");
  Route::post("", [CategoryController::class, "store"])->name("category.store");
  Route::get("edit/{category}", [CategoryController::class, "edit"])->name("category.edit");
  Route::post("update", [CategoryController::class, "update"])->name("category.update");
  Route::get("delete/{category}", [CategoryController::class, "destroy"])->name("category.destroy");
});
