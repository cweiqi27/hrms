<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    public function show()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return view("monitor.payroll", [
            "staff" => Auth::user(),
            "staff_list" => $managed_staff
        ]);
    }

    public function get(Request $request)
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        $employee = Staff::where('staff_id', '=', $request->get('employee'))
            ->get();
    }
}
