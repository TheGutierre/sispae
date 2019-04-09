<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = RedeSocial::whereProviderName('facebook')
            ->whereProviderId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new RedeSocial([
                'provider_id' => $providerUser->getId(),
                'provider_name' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if ($user == null) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => 'loginsocial'
                ]);
            }
            
            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
