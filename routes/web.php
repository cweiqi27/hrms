<?php

use Illuminate\Support\Facades\Route;
use App\Models\Leave;
use App\Models\Employee;
use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'testLeave']);

// Route::get('/something/{leave}', function (Leave $leave) {
//     return view('index', ['leave' => $leave]);
// });
