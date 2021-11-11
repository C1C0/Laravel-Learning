<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
  $posts = Post::latest();

  if (request(Config::get('constants.GET_REQUEST.SEARCH'))) {
    $posts->where('title', 'like', "%" . request(Config::get('constants.GET_REQUEST.SEARCH')) . "%")
        ->orWhere('body', 'like', "%" . request(Config::get('constants.GET_REQUEST.SEARCH')) . "%");
  }

  return view('posts', [
      "posts" => $posts->get(),
      'categories' => Category::all(),
  ]);
})->name('home');

Route::get('posts/{post}', function(Post $post) { // Post::where('slug', $post)->firstOrFail()
  return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function(Category $category) {
  return view('posts', [
      'posts' => $category->posts,
      'categories' => Category::all(),
      'currentCategory' => $category,
  ]);
})->name('category');

Route::get('authors/{author:username}', function(User $author) {
  return view('posts', [
      'posts' => $author->posts,
      'categories' => Category::all(),
  ]);
});