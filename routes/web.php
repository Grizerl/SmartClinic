<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\Guest\LoginController;
use App\Http\Controllers\Clients\AppointmentController;
use App\Http\Controllers\Clients\DashboardController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use Nette\Schema\Expect;

Route::get('/', function () {
    return redirect()->route('guest.show');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware([IsAdmin::class, 'auth', 'verified'])->prefix('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
        Route::resource('doctors', DoctorController::class)->except(['show']);
        Route::resource('/services', ServiceController::class)->except(['show']);
    });
});


require __DIR__.'/guest.php';
