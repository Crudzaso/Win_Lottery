<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Events\UserLogin;

class GoogleController extends Controller
{
    // Redirige a Google para la autenticación
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Maneja la respuesta de Google
    public function handleGoogleCallback()
    {
        try {
            // Intentamos obtener el usuario de Google
            $user = Socialite::driver('google')->user();

            // Verificamos si la información del usuario es válida
            if (is_null($user)) {
                return redirect('/login')->withErrors(['message' => 'No se pudo obtener la información del usuario de Google.']);
            }

            // Validar que el correo esté presente
            if (!$user->getEmail()) {
                return redirect('/login')->withErrors(['message' => 'No se pudo obtener el email de Google.']);
            }

            // Buscar un usuario existente con ese correo
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                // Si el usuario existe, iniciar sesión
                Auth::login($existingUser);
            } else {
                // Si no existe, crear un nuevo usuario
                $newUser = User::create([
                    'name' => $user->getName() ?? 'Nombre desconocido',  // Valor por defecto si no se proporciona el nombre
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt(Str::random(16)),  // Contraseña aleatoria segura
                ]);
                event(new UserCreated(Auth::user()));
                Auth::login($newUser);
            }

            // Despachar el evento de inicio de sesión
            event(new UserLogin(Auth::user()));
            

            // Redirigir al dashboard con la ruta nombrada
            return redirect()->route('dashboard');
            
        } catch (\Exception $e) {
            // Si ocurre un error, redirigir a login con el mensaje de error
            return redirect('/login')->withErrors(['message' => 'Error al autenticar con Google: ' . $e->getMessage()]);
        }
    }
}
