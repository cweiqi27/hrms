<?php

use Illuminate\Support\Facades\Route;
use App\Models\Leave;
use App\Models\Staff;
use App\Http\Controllers\StaffController;

Route::get('/leave', [StaffController::class, 'show']);

// Route::get('/something/{leave}', function (Leave $leave) {
//     return view('index', ['leave' => $leave]);
// });

Route::get('/register', [StaffController::class, 'create']);