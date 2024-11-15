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
    // Redirigir al usuario a Google para autenticarse
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Manejar la respuesta de Google y crear o autenticar al usuario
    public function handleGoogleCallback()
    {
        try {
            // Obtener los datos del usuario desde Google
            $googleUser = Socialite::driver('google')->user();

            // Verificar si el email está presente
            if (!$googleUser->getEmail()) {
                return redirect('/login')->withErrors('No se pudo obtener el email de Google.');
            }

            // Verificar si el usuario ya existe en la base de datos
            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if ($existingUser) {
                // Si el usuario ya existe, iniciar sesión
                Auth::login($existingUser);
            } else {
                // Si el usuario no existe, crear uno nuevo
                $newUser = User::create([
                    'name' => $googleUser->getName() ?? 'Nombre desconocido', // Nombre por defecto si falta
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Contraseña aleatoria segura
                ]);

                // Iniciar sesión con el nuevo usuario
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
