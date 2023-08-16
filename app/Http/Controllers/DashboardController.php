<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  
  public function index() 
  {
    $posts_by_category = Post::with("category")->groupBy("category_id")->select('category_id', DB::raw("count(*) as total"))->get();
    $total_posts = Post::count("*");
    $total_categories = Category::count("*");
    $authors = User::count("*"); 

    return view("dashboard.index", compact("posts_by_category", "total_posts", "total_categories", "authors"));
  }
}
