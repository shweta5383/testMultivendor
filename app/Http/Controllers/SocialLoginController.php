<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            $user_id = $users->id;
            //echo $user_id; die();
            Auth::loginUsingId($user_id);
        }else{
            $user = new User;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->image = $userSocial->getAvatar();
            $user->provider_id = $userSocial->getId();
            $user->provider = $provider;
            $user->password = \Hash::make('shweta123');
            $user->save();

            $user_id = $user->id;
            Auth::loginUsingId($user_id);
            return redirect()->route('home');
        }
    }

    // public function googleCallback($provider){
    //     $userSocial =   Socialite::driver($provider)->stateless()->user();
    //     $users       =   User::where(['email' => $userSocial->getEmail()])->first();
    //     if($users){
    //         $user_id = $users->id;
    //         //echo $user_id; die();
    //         Auth::loginUsingId($user_id);
    //     }else{
    //         $user = new User;
    //         $user->name = $userSocial->getName();
    //         $user->email = $userSocial->getEmail();
    //         $user->image = $userSocial->getAvatar();
    //         $user->provider_id = $userSocial->getId();
    //         $user->provider = $provider;
    //         $user->password = \Hash::make('shweta123');
    //         $user->save();

    //         $user_id = $user->id;
    //         Auth::loginUsingId($user_id);
    //         return redirect()->route('home');
    //     }
    // }
}
