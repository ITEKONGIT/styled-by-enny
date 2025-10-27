<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');

// Booking routes
Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/service', [BookingController::class, 'selectService'])->name('booking.service');
    Route::get('/date-time', [BookingController::class, 'selectDateTime'])->name('booking.date-time');
    Route::post('/confirmation', [BookingController::class, 'confirmation'])->name('booking.confirmation');
    Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/success/{appointment}', [BookingController::class, 'success'])->name('booking.success');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Customer routes (protected)
Route::middleware(['auth'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/appointments', [CustomerController::class, 'appointments'])->name('customer.appointments');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
});