<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialAccountService;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Socialite;

class SocialAuthController extends Controller
{
	public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
        // return Socialite::driver('facebook')->fields([
        //     'first_name', 'last_name', 'email', 'gender', 'birthday'
        // ])->scopes([
        //     'email', 'user_birthday'
        // ])->redirect();
    }   

    public function callback(SocialAccountService $service)
    {
        // when facebook call us a with token

        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        // $user = $service->createOrGetUser(Socialite::driver('facebook')->fields([
        //     'first_name', 'last_name', 'email', 'gender', 'birthday'
        // ])->user());

        if ($user != null) {            
            auth()->login($user);
            return redirect()->to('/');
        } else {
            return redirect()->route('cadastro');
        }     
    }
}
