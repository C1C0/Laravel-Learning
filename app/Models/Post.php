<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
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
    // Of all the blog posts, find the one with a slog that matches the one that was requested
    $allPosts = static::all();

    return $allPosts->firstWhere('slug', $slug);
  }

  public static function all(): Collection {
    return collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($postData) => new Post($postData->title, $postData->body(), $postData->date, $postData->excerpt, $postData->slug))
        ->sortByDesc('date');
  }

}