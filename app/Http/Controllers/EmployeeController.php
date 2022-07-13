<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leave;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function showLeaveEmployee() 
    {
        // 🥶 终于等到周杰伦
        // $employee = Employee::find('id');
        // $leaveEmployee = Leave::whereBelongsTo($employee)->get();
        // return view('index', [ 'employee' => $leaveEmployee ]); 
    }

    public function testLeave()
    {
        $leave = Leave::where('employee_id', 7)->get();
        return view('leave/index', [ 'leave' => $leave ]);
    }
}
