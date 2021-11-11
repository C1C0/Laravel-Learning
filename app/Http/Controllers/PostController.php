<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Config;

class PostController extends Controller
{
    public function index()
    {
        return view(
            'posts',
            [
                "posts" => Post::latest()->filter(
                    request(
                        [
                            Config::get('constants.GET_REQUEST.SEARCH'),
                            Config::get('constants.GET_REQUEST.CATEGORY')
                        ]
                    )
                )->get(),
                'categories' => Category::all(),
                'currentCategory' => Category::where(
                    'slug',
                    request(Config::get('constants.GET_REQUEST.CATEGORY'))
                )->first(),
            ]
        );
    }

    public function show(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
