<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Post extends Model {
  use HasFactory;

  // enables to user Post::factory() -> looks into ...\PostFactory

  // when want to avoid one or more of them - use ->without('category' ...)
  protected $with = ['category', 'author'];

  public function getRouteKeyName() {
    return 'slug';
  }

  /**
   * Enables usage of: Post::filter()-> ...
   *
   * @param $query
   */
  public function scopeFilter($query) {
    if (request(Config::get('constants.GET_REQUEST.SEARCH'))) {
      $query->where('title', 'like', "%" . request(Config::get('constants.GET_REQUEST.SEARCH')) . "%")
          ->orWhere('body', 'like', "%" . request(Config::get('constants.GET_REQUEST.SEARCH')) . "%");
    }
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function author() { // IMPORTANT: this alone would look for author_id !!!
    // We have to specify, which column we refer to => i.e. user_id
    return $this->belongsTo(User::class, 'user_id');
  }
}
