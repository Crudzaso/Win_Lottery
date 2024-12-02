<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VueController;

Route::get('/', [VueController::class, 'index']);
Route::get('/dashboard', [VueController::class, 'dashboard'])->name('dashboard');


