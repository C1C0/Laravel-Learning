<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Config;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        // add a comment to the post
        $request->validate(
            [
                'body' => 'required',
            ]
        );

        $post->comments()->create(
            [
                'user_id' => $request->user()->id,
                'body' => $request->get('body'),
            ]
        );

        return back()->with(Config::get('constants.SESSION.SUCCESS'), 'Comment Added.');
    }
}
