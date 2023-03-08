<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('google') -> redirect();
    }

    public function handleProviderCallback(){
        try{
            $user = Socialite::driver('google') -> user();
            $findUser = User::where('email', $user->id) -> first();
            if($findUser){
                Auth::login($findUser);
                dump($user);
                return redirect() -> route('main');
            }else{
                $newUser = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
//                    'google_id' => $user['sub'],
                ]);
                dump($user);
                Auth::login($newUser);
                return redirect() -> route('main');
            }

        } catch (\Exception $e){
            dump($e);
//            return redirect('/auth/login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect() -> route('main');
    }
}
