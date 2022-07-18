<?php

use App\Models\Leave;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RegisterController;

Route::get('/', [StaffController::class, 'show']);

// Register
Route::get('/register', [RegisterController::class, 'create']);
Route::get('/register/employee', [RegisterController::class, 'createEmployee']);
Route::get('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/staff/{role}', [RegisterController::class, 'store'])->name('staff');

// Login
Route::get('/login', [LoginController::class, 'login']);
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Staff
Route::get('/profile', [StaffController::class, 'profile']);

// Route::get('/something/{leave}', function (Leave $leave) {
//     return view('index', ['leave' => $leave]);
// });
