<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ReceptionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\Doctor\LoginController as DoctorLoginController;
use App\Http\Controllers\Auth\Guest\LoginController;
use App\Http\Controllers\Clients\AppointmentController;
use App\Http\Controllers\Clients\DashboardController;
use App\Http\Controllers\Doctor\AppoinmentController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\RecordController;
use App\Http\Controllers\Doctor\ServicesController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): RedirectResponse {
    return redirect()->route('guest.show');
});

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (): void {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware([IsAdmin::class, 'auth', 'verified'])->prefix('admin')->group(function (): void {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
        Route::resource('/doctors', DoctorController::class)->except(['show']);
        Route::resource('/services', ServiceController::class)->except(['show']);
        Route::get('/appoinment', [ReceptionController::class, 'index'])->name('appoinment.page');
    });

});

Route::middleware(['auth:doctor', 'verified'])->prefix('doctor')->group(function (): void {
    Route::get('/', [DoctorDashboardController::class, 'index'])->name('dashboard.doctor');
    Route::get('/services', [ServicesController::class, 'show'])->name('services.page');
    Route::resource('/medical_record', RecordController::class)->except(['show']);
    Route::resource('/appoinment', AppoinmentController::class)->except(['show']);
    Route::post('/logout', [DoctorLoginController::class, 'logoutDoctor'])->name('doctor.logout');
});


require __DIR__.'/guest.php';
require __DIR__.'/personnel.php';
