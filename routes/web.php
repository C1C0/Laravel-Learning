<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

Route::get(
    'newsletter',
    function (Request $request) {
        $request->validate(
            [
                'email' => 'required|email',
            ]
        );

        $mailchimp = new ApiClient();

        $mailchimp->setConfig(
            [
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us6',
            ]
        );

        try {
            $mailchimp->lists->addListMember(
                '<list_id>',
                [
                    'email_address' => $request->get('email'),
                    'status' => 'subscribed',
                ]
            );
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
