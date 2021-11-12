<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // Redirects to previous page if condition not met
        $attributes = request()->validate(
            [
                'name' => ['required'], // new syntax,
                'username' => 'required|max:25', // old syntax
                'email' => ['required', 'email'],
                'password' => ['required', 'min:7', 'max:255'],
            ]
        );

        $user = new User();
        $user->name = $attributes['name'];
        $user->username = $attributes['username'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->save();

        return redirect('/');
    }
}
