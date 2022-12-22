<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\WorkHours;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function show()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return Auth::user()->role === 'admin'
            ? view("monitor.performance", [
                "staff" => Auth::user(),
                "staff_list" => $managed_staff
            ])
            : view("monitor.performance", [
                "staff" => Auth::user(),
            ]);
    }

    public function get(Request $request)
    {
        if($request->get('employee') === null)
            return back()->with("error", "Please select an employee.");

        $employee = Staff::find($request->get('employee'));
        $work_hours = WorkHours::where('staff_id', '=', $employee->staff_id)
            ->value('monthly_work_hours');

        $start_date = Carbon::now()->startOfMonth();
        $end_date = Carbon::now()->endOfMonth();
        $business_hours = 0;

        while($start_date->lte($end_date)) {
            if(Carbon::now()->isBusinessDay()) {
                $business_hours += Carbon::parse('09:00')->diffInHours(Carbon::parse('17:00'));
            }
            $start_date->addDay();
        }

        $work_performance = $work_hours > 0
            ? round($work_hours / $business_hours * 100, 2)
            : 0;

        if(Auth::user()->role === 'employee') {
            return view("monitor.performance", [
                "staff" => Auth::user(),
                "work_performance" => $work_performance
            ]);
        }

        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();

        return view("monitor.performance", [
            "staff" => Auth::user(),
            "staff_list" => $managed_staff,
            "employee" => $employee,
            "work_performance" => $work_performance
        ]);
    }
}
