<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use \Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LinkedinController extends Controller
{
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function linkedinCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();

            $linkedinUser = User::where('oauth_id', $user->id)->first();

            if ($linkedinUser) {
                Auth::login($linkedinUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'linkedin',
                    'password' => encrypt('admin12345')
                ]);

                Auth::login($newUser);
            }

            return redirect('/dashboard');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
