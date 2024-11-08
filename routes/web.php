<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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



Route::middleware('auth:sanctum')->group(function () {
    Route::resource('raffles', RaffleController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('users', UserController::class);
});
