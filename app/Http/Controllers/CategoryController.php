<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
  
  public function index()
  {
    $categories = Category::all(); 
    return view("categories.index", compact("categories"));
  }

  public function store(Request $request) 
  {
    $validator = Validator::make($request->all(), [
      'description' => "required|min:3|unique:categories",
    ]);

    if($validator->fails()) {
      return redirect(route("category.index"))->withErrors($validator->errors());
    }

    $category = new Category();
    $category->description = $request->description;
    $category->save(); 

    return redirect(route("category.index"))->with("category_created", "category created was successfully");
  }

  public function update(Request $request)
  {
    $category = Category::findOrFail($request->id);


    if(!$category) {
      return redirect(route("category.index"))->withErrors(["category_not_found", "category does not exists"]);
    }

    $category->description = ($request->has("description") && strlen($request->description) > 0 ) 
      ? $request->description 
      : $category->description;
    $category->save();

    return redirect(route("category.index"))->with("category_updated", "category was updated successfully");
  }

  public function edit(Category $category) 
  { 
    return view("categories.edit", compact("category"));
  }

  public function destroy(Category $category)
  {
    $category->delete();

    return redirect(route("category.index"));
  }
}
