<?php

namespace App\Http\Controllers;

use App\Models\AvailableLeaves;
use App\Models\Staff;
use App\Models\WorkHours;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    // Register employee page
    public function createEmployee()
    {
        return view("staff.create")->with("role", "employee");
    }

    // Register admin page
    public function createAdmin()
    {
        return view("staff.create")->with("role", "admin");
    }

    // Register staff
    public function store(Request $request, $role)
    {
        $formFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("staffs", "email")],
            "password" => [
                "required",
                "confirmed",
                Password::min(7)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            "contact_no" => [
                "required",
                "min:9",
                Rule::unique("staffs", "contact_no"),
            ],
            "status" => ["required", "min:3"],
            "department" => ["required"],
            "position" => ["required"],
            "level" => ["required"],
        ]);

        // Append role to array (admin/employee)
        $formFields["role"] = $role;

        // Set base salary (to be updated by admin with Payroll function)
        $formFields["salary"] = 0;

        $role === 'employee'
            ? $formFields["manager_id"] = (
                Staff::where("role", "=", "admin")
                    ->get())
                ->random()
                ->staff_id
            : $formFields["manager_id"] = null;

        // Hash password
        $formFields["password"] = bcrypt($formFields["password"]);

        // Create staff
        $staff = Staff::create($formFields);

        // Create work hours row
        WorkHours::create([
            'staff_id' => $staff->staff_id,
            'monthly_work_hours' => 0,
            'yearly_work_hours' => 0,
            'accumulative_work_hours' => 0
        ]);

        AvailableLeaves::create([
            'staff_id' => $staff->staff_id,
            'available_annual_leaves' => 8,
            'available_medical_leaves' => 14,
            'available_maternity_leaves' => 60
        ]);

        // Login
        Auth::login($staff);

        // Email verification
        event(new Registered($staff));

        return redirect("/email/verify")
        ->with([
            "info" => "Verify email to continue."
        ]);
    }
}
