<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    $posts = Post::with("category")->get(["id", "title", "category_id"]);


    return view("posts.index", compact("categories", "posts"));
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "title" => "required",
      "content" => "required",
      "image_path" => "required",
      "category_id" => "required",
    ]);

    if ($validator->fails()) {
      return redirect(route("posts.index"))->withErrors($validator->errors());
    }

    $post = new Post();

    $file = $request->file("image_path");
    $folder = "images/posts/";
    $filename = time() . $file->getClientOriginalName();
    $upload = $request->file("image_path")->move($folder, $filename);
    $post->img_path = "{$folder}{$filename}";


    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category_id;
    $post->user_id = Auth::user()->id;
    $post->save();

    return redirect(route("posts.index"))->with("post_created", "post was created successfully");
  }

  public function edit(Post $post) 
  {
    $categories = Category::all();
    return view("posts.edit", compact("post", "categories"));
  }

  public function update(Request $request) 
  {
    $validator = Validator::make($request->all(), [
      'title' => "required",
      'content' => "required",
      "category_id" => "required",
    ]);  

    if($validator->fails()) {
      return redirect(route("posts.index"))->withErrors($validator->errors());
    }

    $post = Post::findOrFail($request->id);

    if(!$post) {
      return redirect(route("posts.index"))->withErrors(["post_not_found" => "the post does not exists"]);
    }

    if($request->has("image_path")) {
      unlink($post->img_path);
      $file = $request->file("image_path");
      $filename = time() . $file->getClientOriginalName();
      $folder = "images/posts/";
      $upload = $file->move($folder, $filename);
      $post->img_path = "{$folder}{$filename}";
    }

    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category_id;
    $post->save();

    return redirect(route("posts.index"))->with("post_updated", "post was updated successfully");
  }

  public function destroy(Post $post)
  {
    unlink(public_path($post->img_path));
    $post->delete();
    return redirect(route("posts.index"));
  }  
}
