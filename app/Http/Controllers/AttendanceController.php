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
        return view("monitor.attendance", [
            "staff" => Auth::user(),
            "staff_list" => $managed_staff
        ]);
    }

    public function getAttendance(Request $request) {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        $employee = Staff::find($request->get('employee'));
//        $work_hours = WorkHours::where('staff_id', '=', $employee->staff_id)
//            ->get();
        $attendance = Attendance::where('staff_id', '=', $request->get('employee'))
            ->get();
        $leave = Leave::where('staff_id', '=', $request->get('employee'))
            ->get();

        $now = Carbon::now();
        $period = [];
        $attendance_arr = [];

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


//        $keys = array_keys($period);
//        for($i = 0; $i < count($period); $i++) {
//            foreach($period[$keys[$i]] as $key => $value) {
//
//            }
//        }

        return view("monitor.attendance", [
            "staff" => Auth::user(),
            "staff_list" => $managed_staff,
            "period" => $period
        ]);
    }
}
