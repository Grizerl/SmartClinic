<?php

use App\Http\Controllers\Auth\Doctor\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('personnel')->group(function (): void {

    Route::get('/login', [LoginController::class, 'show'])->name('personnel.show');

    Route::post('/login', [LoginController::class, 'store'])->name('personnel.store');
});
