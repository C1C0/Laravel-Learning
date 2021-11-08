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

  /**
   * Of all the blog posts, find the one with a slog that matches the one that was requested
   * @param $slug
   *
   * @return mixed
   */
  public static function find($slug) {
    return static::all()->firstWhere('slug', $slug);
  }

  /**
   * Of all the blog posts, find the one with a slog that matches the one that was requested
   * Fail on not found
   * @param $slug
   */
  public static function findOrFail($slug) {
    $post = static::find($slug);

    if(empty($post)){
      throw new ModelNotFoundException();
    }

    return $post;
  }

  public static function all(): Collection {
    return cache()->rememberForever('posts.all', function() {
      return collect(File::files(resource_path("posts")))
          ->map(fn($file) => YamlFrontMatter::parseFile($file))
          ->map(fn($postData) => new Post($postData->title, $postData->body(), $postData->date, $postData->excerpt, $postData->slug))
          ->sortByDesc('date');
    });
  }

}