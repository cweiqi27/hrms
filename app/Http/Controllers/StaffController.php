<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave;
use App\Models\Staff;

class StaffController extends Controller
{
    public function show()
    {
        return view('leave.index');
    }

    // Profile page
    public function profile() {
        // $staff_name = Auth::user()->name;
        // $staff_email = Auth::user()->email;
        

        return view('staff.profile', [
            'staff_name' => Auth::user()->name,
            'staff_email' => Auth::user()->email,
            'staff_contact_no' => Auth::user()->contact_no,
            'staff_status' => Auth::user()->status,
            'staff_department' => Auth::user()->department,
            'staff_salary' => Auth::user()->salary,
        ]);
    }
}
