<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

    public function create()
    {
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'title' => 'required',
                'thumbnail' => ['required', 'image'],
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
            ]
        );

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnail');

        $post = Post::create($attributes);

        return redirect("/posts/{$post->slug}");
    }
}
