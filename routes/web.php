<?php

use App\Models\Leave;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RegisterController;

Route::get('/', [StaffController::class, 'show']);

// Register
Route::get('/register', [RegisterController::class, 'create']);
Route::get('/register/employee', [RegisterController::class, 'createEmployee']);
Route::get('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/store/{role}', [RegisterController::class, 'store'])->name('register.store');

// Email Verification
Route::get('/email/verify', 
    [EmailController::class, 'verify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 
    [EmailController::class, 'handler'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', 
    [EmailController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Login
Route::get('/login', [LoginController::class, 'login']);
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Staff
Route::get('/profile', [StaffController::class, 'profile'])->middleware(['auth', 'verified']);

