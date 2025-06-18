<?php

use App\Http\Controllers\Auth\Guest\LoginController;
use App\Http\Controllers\Auth\Guest\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('guest')->middleware('guest')->group(function (): void {

    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'show'])->name('guest.show');

    Route::post('/login', [LoginController::class, 'store'])->name('guest.store');
});
