<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('google') -> redirect();
    }

    public function handleProviderCallback(){
        $user = Socialite::driver('google') -> user();
    }
}
