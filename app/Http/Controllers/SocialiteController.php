<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Illuminate\Support\Facades\Auth;
class SocialiteController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
        try {
           $socialUser=Socialite::driver($provider)->user();
        } catch (InvalidStateException $ex) {
             $socialUser=Socialite::driver($provider)->stateless()->user();
        }
        $user=User::where("provider_id",$socialUser->getId())->first();
        if($user){
            Auth::login($user);
            return redirect("/home");
        }else{
            $user=User::create([
                "name"=>$socialUser->getName(),
                "email"=>$socialUser->getEmail(),
                "avatar"=>$socialUser->getAvatar(),
                "password"=>bcrypt(uniqid($socialUser->getId())),
                "provider"=>$provider,
                "provider_id"=>$socialUser->getId()
            ]);
            Auth::login($user);
            return redirect("/home");
        }
    }
}
