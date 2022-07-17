<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave;
use App\Models\Staff;

class StaffController extends Controller
{
    // TO BE USED
    public function show()
    {
        // $leaveStaff = Leave::whereBelongsTo($staff)->get();
        $leave = Leave::where('staff_id', 7)->get();
        return view('leave/index', [ 'leave' => $leave ]);
    }
}
