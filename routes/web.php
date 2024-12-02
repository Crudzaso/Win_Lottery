<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

Route::redirect('/', '/dashboard');

    // Rutas autenticadas con Jetstream
Route::middleware([
    'auth:sanctum',  // Middleware para verificar que el usuario está autenticado
    config('jetstream.auth_session'),
    'verified', // Verifica si el usuario tiene su email verificado
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

    // Rutas para iniciar sesión con Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware('auth:sanctum')->group(function () {
});
