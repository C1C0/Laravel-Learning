<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post {
  public static function find($slug) {

    // using helper functions
    // also for "/app", "/resources" ...
    if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
      return new ModelNotFoundException();
    }

    return cache()->remember("post.{$slug}", now()->addHour(), fn() => file_get_contents($path));
  }

}