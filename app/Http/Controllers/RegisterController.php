<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

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
                'name' => ['required', 'max:30'], // new syntax,
                'username' => 'required|min:3|max:25|unique:users,username', //unique:<table>,<column>
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:7', 'max:255'],
            ]
        );

        $user = new User();
        $user->name = $attributes['name'];
        $user->username = $attributes['username'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->save();

        return redirect('/')->with(Config::get('constants.SESSION.SUCCESS'), 'Your account has been created.');
    }
}
