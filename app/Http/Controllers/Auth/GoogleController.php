<?php

//app/Http/Controllers/Auth/GoogleController.php
namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt('password') // Crear una contraseña segura
            ]);
            Auth::login($newUser);
        }

        return Redirect::to('/dashboard');
    }
}
