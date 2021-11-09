<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    User::truncate();
    Category::truncate();
    Post::truncate();

    $user = User::factory()->create();

    $category = new Category;
    $category->name = "Work";
    $category->slug = "work";
    $category->save();

    $category = new Category;;
    $category->name = "Hobbies";
    $category->slug = "hobbies";
    $category->save();

    $category = new Category;
    $category->name = "Cooking";
    $category->slug = "cooking";
    $category->save();

    $post = new Post;
    $post->title = "My first post";
    $post->slug = "my-first-post";
    $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labor
um.</p>";
    $post->excerpt = "Lorem ipsum dolor simet.";
    $post->category_id = 1;
    $post->user_id = $user->id;
    $post->save();

    $post = new Post;
    $post->title = "My second post";
    $post->slug = "my-second-post";
    $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labor
um.</p>";
    $post->excerpt = "Lorem ipsum dolor simet.";
    $post->category_id = 2;
    $post->user_id = $user->id;
    $post->save();

    $post = new Post;
    $post->title = "My third post";
    $post->slug = "my-third-post";
    $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labor
um.</p>";
    $post->excerpt = "Lorem ipsum dolor simet.";
    $post->category_id = 3;
    $post->user_id = $user->id;
    $post->save();

    $post = new Post;
    $post->title = "My fourth post";
    $post->slug = "my-fourth-post";
    $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labor
um.</p>";
    $post->excerpt = "Lorem ipsum dolor simet.";
    $post->category_id = 1;
    $post->user_id = $user->id;
    $post->save();


  }
}
