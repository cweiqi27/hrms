<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            "staff_role" => Auth::user()->role
        ]);
    }

    public function editStaff(Staff $staff)
    {
        return view("monitor.edit-staff", [
            "staff" => $staff,
            "staff_role" => Auth::user()->role
        ]);
    }

    public function updateStaff(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            "contact_no" => [
                "required",
                "min:9",
                Rule::unique("staffs", "contact_no"),
            ],
            'department' => ['required']
        ]);

        $staff->name = $request->input('name');
        $staff->contact_no = $request->input('contact_no');
        $staff->department = $request->input('department');

        $staff->save();


        return back()
            ->withErrors('Error')
            ->withMessage('Profile successfully updated.');
    }
}
