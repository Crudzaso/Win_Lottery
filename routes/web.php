<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

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

    //Endpoints de las rifas (reconvenir estos nombres luego)
Route::get('/dashboard/raffles', [RaffleController::class, 'index'])->name('raffles.index');
Route::get('/dashboard/raffles/myraffles/{$userID}', [RaffleController::class, 'index'])->name('raffles.show.myraffles');
Route::post('/raffles/create', [RaffleController::class, 'create'])->name('raffles.create');
Route::put('/raffles/update/{$id}', [RaffleController::class, 'update'])->name('raffles.update');
Route::delete('/raffles/{$id}', [RaffleController::class, 'destroy'])->name('raffles.destroy');

    //Endpoints de los tickets (reconvenir estos nombres luego)
Route::post('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/purchase/{$ticketID}/{$ticketNumber}/{$raffleID}', [TicketController::class, 'store'])->name('ticket.purchase');
Route::get('/ticket/{$raffleID}', [TicketController::class, 'show'])->name('ticket.show');
Route::put('/ticket/{$id}', [TicketController::class, 'update'])->name('ticket.update');
