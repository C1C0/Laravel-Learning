<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with(Config::get('constants.SESSION.SUCCESS'), 'Goodbye !');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // valid the request
        $credentials = request()->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required',
            ]
        );

        // attempt to auth and login the user
        // based on the credentials

        // ->attempt() -> check credentials, and also signs in
        if (auth()->attempt($credentials)) {
            // IMPORTANT !!! regenerate SESSION ID to prevent
            // Session Fixation
            session()->regenerate();

            return redirect('/')->with(Config::get('constants.SESSION.SUCCESS'), 'Welcome Back!');
        }

        //auth failed
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified']);// $errors

        // more common, but same effect as the code above
        throw ValidationException::withMessages(
            [
                'email' => 'Your provided credentials could not be verified',
            ]
        );
    }
}
