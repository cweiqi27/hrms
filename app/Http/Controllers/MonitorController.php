<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;

class MonitorController extends Controller
{
    public function show()
    {
        return view("monitor.index", [
            "staff" => Auth::user(),
        ]);
    }

    // Individual staff account page
    public function showStaff(Staff $staff)
    {
        return view("monitor.show-staff", [
            "staff" => $staff,
        ]);
    }
}
