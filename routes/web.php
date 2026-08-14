<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

use App\Http\Controllers\AdminAuthController;

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->middleware('auth');

use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::get('/services', function () {
    return view('services');
})->name('services');

use App\Http\Controllers\BookingController;

Route::get('/book/{service}', [BookingController::class, 'create'])
    ->middleware('auth')
    ->name('booking.create');

Route::post('/book', [BookingController::class, 'store'])
    ->middleware('auth')
    ->name('booking.store');

Route::get('/payment/callback', [BookingController::class, 'callback'])
    ->middleware('auth')
    ->name('payment.callback');