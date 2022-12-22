<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\WorkHours;
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

    // display the current salary (yet to be updated, in DB),
    // and the expected year-end bonus taking into account
    // on hours worked in that year.
    public function getPay(Request $request)
    {
        if($request->get('employee') === null)
            return back()->with("error", "Please select an employee.");

        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        $employee = Staff::find($request->get('employee'));
        $work_hours = WorkHours::where('staff_id', '=', $employee->staff_id)
            ->get();

        $pay = $employee->salary;

        // Add bonus based on hours worked and multiply with a set percentage
        // Formula:
        // Bonus = (Base salary * 6% bonus) + (Total hours worked this year / 10)
        $bonus_percentage = 0.06;
        $work_hours_bonus = ceil($work_hours->first()->yearly_work_hours/10);
        $bonus = ceil($pay * $bonus_percentage + $work_hours_bonus);

        return view("monitor.payroll", [
                "staff" => Auth::user(),
                "employee" => $employee,
                "bonus" => $bonus,
                "staff_list" => $managed_staff
            ]);
    }

    // This method will update the employee's salary based on three factors,
    // position, seniority, and EPF.
    // Formula:
    // Gross Pay = (Gross salary based on job position * Seniority multi)
    // EPF = Gross Pay * 9%
    // Net Pay = Gross Pay - EPF
    public function updatePay(Request $request)
    {
        $employee = Staff::find($request->input('employee'));
        $department = $employee->department;

        // Get gross salary based on job position
        if($department === 'IT') {
            $positions = config('shared_vars.itPositions');
        } else if($department === 'Accounting/Finance') {
            $positions = config('shared_vars.financePositions');
        } else if($department === 'HR') {
            $positions = config('shared_vars.hrPositions');
        } else {
            $positions = config('shared_vars.marketingPositions');
        }

        $pay = $positions[$employee->position];

        // Multiply salary based on seniority
        $level_pay_multi = [
            'Junior' => 1,
            'Mid' => 2,
            'Senior' => 3
        ];
        $pay *= $level_pay_multi[$employee->level];

        // Take a percentage of salary and put them into EPF
        $epf = 0.09;
        $pay = $pay - $pay * $epf;

        $employee->salary = $pay;
        $employee->save();

        return back()
            ->withSuccess("Salary updated successfully.");
    }

}
