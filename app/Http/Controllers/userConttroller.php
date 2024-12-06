<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            if (!$googleUser->getEmail()) {
                return redirect('/login')->withErrors('No se pudo obtener el email de Google.');
            }

            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $googleUser->getName() ?? 'Nombre desconocido', // Nombre por defecto si falta
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Contraseña aleatoria segura
                ]);

                Auth::login($newUser);
            }

            // Redirigir al usuario al dashboard o la página principal
            return Redirect::to('/dashboard');
        } catch (\Exception $e) {
            // Capturar excepciones y redirigir con un mensaje de error
            return redirect('/login')->withErrors('Error al autenticar con Google.');
        }
    }
}
