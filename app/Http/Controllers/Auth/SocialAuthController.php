<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Provider_user;
use Auth;
use User;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $provider_user = Socialite::driver('google')->user();
            $user = Provider_user::findUser($provider_user->id, $provider_user->email);
            if ($user != null) {
                Auth::loginUsingId($user->id);

                return redirect()->route('index');
            } else {
                return view('auth/provider_register', compact('provider_user'));
            }

        } catch (\Exception $e) {
            abort(404);
        }
    }
}
