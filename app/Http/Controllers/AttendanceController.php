<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Leave;
use App\Models\Staff;
use App\Models\WorkHours;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function show() {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return Auth::user()->role === 'admin'
            ? view("monitor.attendance", [
                "staff" => Auth::user(),
                "staff_list" => $managed_staff
            ])
            : view("monitor.attendance", [
                "staff" => Auth::user()
            ]);
    }

    public function getAttendance(Request $request) {
        $attendance = Attendance::where('staff_id', '=', $request->get('employee'))
            ->get();
        $leave = Leave::where('staff_id', '=', $request->get('employee'))
            ->get();

        $now = Carbon::now();
        $period = [];

        switch($request->get('period')) {
            case 'monthly':
                $period = CarbonPeriod::create($now->startOfMonth(), Carbon::now())->toArray();
                break;
            case 'yearly':
                $period = CarbonPeriod::create($now->startOfYear(), Carbon::now())->toArray();
                break;
        }

        foreach($period as $key => $date) {
            if(! Carbon::parse($date)->isBusinessDay()) {
                unset($period[$key]);
                continue;
            }

            foreach ($attendance as $attendances) {
                if(Carbon::parse($attendances->date)->isSameDay(Carbon::parse($date))) {
                    $isPresentKey = $date . "isPresent";
                    $period[$isPresentKey] = true;
                    break;
                }
            }

            foreach ($leave as $leaves) {
                if(Carbon::parse($leaves->date)->isSameDay(Carbon::parse($date))) {
                    $isLeaveKey = $date . "isLeave";
                    $period[$isLeaveKey] = true;
                    break;
                }
            }
        }

        if(Auth::user()->role === 'employee') {
            return view("monitor.attendance", [
                "staff" => Auth::user(),
                "period" => $period
            ]);
        }

        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();

        return view("monitor.attendance", [
            "staff" => Auth::user(),
            "staff_list" => $managed_staff,
            "period" => $period
        ]);
    }
}
