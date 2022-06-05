<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function loginOrRegisterBySocial(SocialUser $socialUser, $driver): string
    {
        $dbSocialKey = $driver.'_id';
        $socialId = strval($socialUser->getId());

        $user = User::where($dbSocialKey, $socialId)->first();

        if ($user) {
            if ($socialUser->getEmail()) {
                $user->email = $socialUser->getEmail();
            }
            if ($socialUser->getName()) {
                $user->name = $socialUser->getName();
            }
            if ($socialUser->getAvatar()) {
                $user->avatar = $socialUser->getAvatar();
            }
        } else {
            $user = new User();
            $userData = [
                'email'         => $socialUser->getEmail(),
                'name'          => $socialUser->getName(),
                'avatar'        => $socialUser->getAvatar(),
                $dbSocialKey    => $socialId,
            ];
            $user->fill($userData);
        }

        if ($user->save()) {
            $user->fresh();
            Auth::loginUsingId($user->id);
        }

        return route('account');
        //throw new ModelNotFoundException('Model Not Found');
    }
}
