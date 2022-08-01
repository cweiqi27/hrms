<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RegisterController;

// Register
Route::controller(RegisterController::class)->group(function() {
    Route::middleware('guest')->group(function() {
        Route::get('/register-employee', 'createEmployee')->name('register.employee');
        Route::get('/register-admin', 'createAdmin')->name('register.admin');
    });

    Route::post('/register/store/{role}', 'store')->name('register.store');
});

// Email verification
Route::get('/email/verify', 
    [AuthController::class, 'verify'])->middleware(['auth', 'unverified'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 
    [AuthController::class, 'verifyHandler'])->middleware(['auth', 'unverified', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', 
    [AuthController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Login
Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->middleware('guest')->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Password reset
Route::get('/forgot-password', 
    [AuthController::class, 'forgot'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', 
    [AuthController::class, 'forgotHandler'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', 
    [AuthController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', 
    [AuthController::class, 'resetHandler'])->middleware('guest')->name('password.update');

// Staff / Home 
Route::get('/', [StaffController::class, 'show'])->middleware(['auth', 'verified'])->name('home');
Route::get('/profile', [StaffController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');

// Leave
Route::get('/leave', [LeaveController::class, 'show'])->middleware(['auth', 'verified'])->name('leave.show');