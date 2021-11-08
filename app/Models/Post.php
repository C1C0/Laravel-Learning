<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

  public function __construct(public $title, public $body, public $date, public $excerpt, public $slug) {
    $this->title = $title;
    $this->body = $body;
    $this->date = $date;
    $this->excerpt = $excerpt;
    $this->slug = $slug;
  }

  public static function find($slug) {
    // using helper functions
    // also for "/app", "/resources" ...
    if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
      return new ModelNotFoundException();
    }

    return cache()->remember("post.{$slug}", now()->addHour(), fn() => file_get_contents($path));
  }

  public static function all() {
    return collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($postData) => new Post($postData->title, $postData->body(), $postData->date, $postData->excerpt, $postData->slug));
  }

}