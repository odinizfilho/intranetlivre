<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\View;

class LoginWithGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('oauth_id', $user->id)->orWhere('email', $user->email)->first();

            if ($findUser) {
                if ($findUser->oauth_id === $user->id) {
                    Auth::login($findUser);
                } else {
                    if ($findUser->oauth_id === null && $findUser->oauth_type === null) {
                        // Atualizar os dados do usuário existente
                        $findUser->oauth_id = $user->id;
                        $findUser->oauth_type = 'google';
                        $findUser->save();

                        Auth::login($findUser);
                    } else {
                        return view('errors.email-duplicate');
                    }
                }
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'google',
                    'password' => Hash::make('123456dummy')
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('dashboard');
        } catch (ValidationException $e) {
            dd($e->getMessage());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
