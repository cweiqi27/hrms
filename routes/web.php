<?php

use App\Models\Leave;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RegisterController;

Route::get('/', [StaffController::class, 'show']);

// Route::get('/something/{leave}', function (Leave $leave) {
//     return view('index', ['leave' => $leave]);
// });

// Register
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/staff', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'login']);
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

