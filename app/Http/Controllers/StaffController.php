<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leave;
use App\Models\Staff;

class StaffController extends Controller
{
    // register staff user
    public function create() 
    {
        return view('register/create'); 
    }


    public function show()
    {
        // $leaveStaff = Leave::whereBelongsTo($staff)->get();
        $leave = Leave::where('staff_id', 7)->get();
        return view('leave/index', [ 'leave' => $leave ]);
    }
}
