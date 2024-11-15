<?php

//app/Http/Controllers/Auth/GoogleController.php
namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str; // Para generar contraseñas aleatorias
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
        $user = Socialite::driver('google')->user();
        
        // Validar datos importantes antes de proceder
        if (!$user->getEmail()) {
            return redirect('/login')->withErrors('No se pudo obtener el email de Google.');
        }
        
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->getName() ?? 'Nombre desconocido', // Valor por defecto si falta el nombre
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt(Str::random(16)), // Contraseña aleatoria segura
            ]);
            Auth::login($newUser);
        }

        return Redirect::to('/dashboard');
    } catch (\Exception $e) {
        // Capturar excepciones y redirigir con mensaje de error
        return redirect('/login')->withErrors('Error al autenticar con Google.');
    }
}
}
