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
            $findUser = User::where('email', $user-> email) -> first();
            dump($user);
            if($findUser){
                print_r('aaaa');
                dump($findUser.get_current_user());
                Auth::login($findUser);

//                return redirect('main')-> with($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'google_id' => $user['sub'],
                ]);
                dump($user);
                Auth::login($newUser);
                return response()->json($newUser);
//                return redirect('main', ['user' => $newUser]);
            }

        } catch (\Exception $e){
            dump($e);

            return redirect('/auth/login');
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        dump($request);
        return response()->json($request->user());
    }
}
