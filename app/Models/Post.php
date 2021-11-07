<?php


namespace App\Models;


class Post {
  public static function find($slug) {

    // using helper functions
    // also for "/app", "/resources" ...
    if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
      return redirect('/');
    }

    return cache()->remember("post.{$slug}", now()->addHour(), fn() => file_get_contents($path));
  }

}