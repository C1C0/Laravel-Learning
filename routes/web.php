<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get(
    'newsletter',
    function (Request $request, Newsletter $newsletter) {
        $request->validate(
            [
                'email' => 'required|email',
            ]
        );

        try {
            $newsletter->subscribe($request->get('email'));
        } catch (Exception) {
            ValidationException::withMessages(['email' => 'This email could not be added']);
        }

        return redirect('/')->with(config('constants.SESSION.SUCCESS'), "You're now signed up for our newsletter");
    }
);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts/{post}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
