<?php

namespace App\Http\Controllers;

use App\Models\AvailableLeaves;
use App\Models\Leave;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    public function show()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return view("leave.index", [
            "staff" => Auth::user(),
            "staff_list" => $managed_staff
        ]);
    }

    public function create()
    {
        $available_leaves = AvailableLeaves::where('staff_id', '=', Auth::user()->staff_id)
            ->get();
        $applied_leaves = Leave::where('staff_id', '=', Auth::user()->staff_id)
            ->orderBy('leave_date', 'ASC')
            ->get();
        return view("leave.create", [
            "staff" => Auth::user(),
            "available_leaves" => $available_leaves,
            "applied_leaves" => $applied_leaves,
        ]);
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'leave_date' => ['required'],
            'leave_type' => ['required']
        ]);

        $formFields['leave_status'] = 'pending';
        $formFields['staff_id'] = Auth::user()->staff_id;

        $matching_leave = Leave::where('staff_id', '=', Auth::user()->staff_id)
            ->where('leave_date', '=', $request->get('leave_date'))
            ->get();

        if(count($matching_leave) > 0) {
            return back()
                ->with([
                    "staff" => Auth::user(),
                    "error" => "A leave has already been applied on the selected date."
                ]);
        } else {
            Leave::create($formFields);
            $available_leave_type = "available_" . $request->get('leave_type') . "_leaves";
            AvailableLeaves::where('staff_id', '=', Auth::user()->staff_id)
                ->decrement($available_leave_type);
        }


        return back()
            ->with([
                "staff" => Auth::user(),
                "success" => "Leave successfully applied, pending for review."
            ]);
    }

    public function manageLeaveAdmin()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return view("leave.manage-admin", [
            "staff" => Auth::user(),
            "managed_staff" => $managed_staff
        ]);
    }

    public function manageLeaveStaff()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return view("leave.manage-admin", [
            "staff" => Auth::user(),
            "managed_staff" => $managed_staff
        ]);
    }

    public function getLeave(Request $request)
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        $leaves = Leave::where('staff_id', '=', $request->get('employee'))
            ->where('leave_date', '>', Carbon::yesterday())
            ->get();
        $employee = Staff::where('staff_id', '=', $request->get('employee'))
            ->get();

        return view('leave.manage-admin', [
            'staff' => Auth::user(),
            'leaves' => $leaves,
            'managed_staff' => $managed_staff,
            'employee' => $employee,
            'message_type' => 'info'
        ]);
    }

    public function update(Request $request)
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        $leave = Leave::where('staff_id', '=', $request->get('employee'))
            ->get();

    }
}
