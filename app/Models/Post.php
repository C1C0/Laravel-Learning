<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // enables to user Post::factory() -> looks into ...\PostFactory

    // when want to avoid one or more of them - use ->without('category' ...)
    protected $with = ['category', 'author'];

    public function getRouteKeyName() {
      return 'slug';
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function author(){ // IMPORTANT: this alone would look for author_id !!!
      // We have to specify, which column we refer to => i.e. user_id
      return $this->belongsTo(User::class, 'user_id');
    }
}
