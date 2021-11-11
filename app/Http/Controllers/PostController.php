<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PostController extends Controller
{
    public function index(){
      $posts = Post::latest();

      if (request(Config::get('constants.GET_REQUEST.SEARCH'))) {
        $posts->where('title', 'like', "%" . request(Config::get('constants.GET_REQUEST.SEARCH')) . "%")
            ->orWhere('body', 'like', "%" . request(Config::get('constants.GET_REQUEST.SEARCH')) . "%");
      }

      return view('posts', [
          "posts" => $posts->get(),
          'categories' => Category::all(),
      ]);
    }

    public function show(Post $post){
      return view('post', ['post' => $post]);
    }
}
