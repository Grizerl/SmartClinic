<?php

use App\Http\Controllers\Auth\Guest\LoginController;
use App\Http\Controllers\Clients\AppointmentController;
use App\Http\Controllers\Clients\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('guest.show');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

require __DIR__.'/guest.php';
