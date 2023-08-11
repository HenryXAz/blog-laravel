<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
  public function category()
  {
    return $this->hasMany(Category::class, "id");
  }


  use HasFactory;

  protected $guard = [];
}
