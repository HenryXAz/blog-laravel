<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
  public function index()
  {
    $posts = Post::with("category")->paginate(5);

    return view("welcome", compact("posts"));
  }

  public function show(Post $post) {
    $publish_date = date("d-m-Y", strtotime($post->created_at)); 
    return view("show-post", compact("post", "publish_date"));
  }
}
