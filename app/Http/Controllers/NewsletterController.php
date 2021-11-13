<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Request $request, Newsletter $newsletter)
    {
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
}
