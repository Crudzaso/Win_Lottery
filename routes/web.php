<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

Route::redirect('/', '/dashboard');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::middleware('auth:sanctum')->group(function () {
    
});

Route::get('/send-webhook', function () {
    event(new \App\Events\WebhookMessageEvent('¡Este es un mensaje desde el evento!'));
    return 'Mensaje enviado';
});