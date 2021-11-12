<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with(Config::get('constants.SESSION.SUCCESS'), 'Goodbye !');
    }
}
