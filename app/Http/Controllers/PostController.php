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
            'posts.index',
            [
                "posts" => Post::latest()->filter(
                    request(
                        [
                            Config::get('constants.GET_REQUEST.SEARCH'),
                            Config::get('constants.GET_REQUEST.CATEGORY'),
                            Config::get('constants.GET_REQUEST.AUTHOR'),
                        ]
                    )
                )->paginate(6)->withQueryString(),
            ]
        );
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
