<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    // Register page
    public function create() {
        return view('staff.create'); 
    }

    // Register employee page
    public function createEmployee() {
        return view('staff.create_staff')->with('role', 'employee');
    }

    // Register admin page
    public function createAdmin() {
        return view('staff.create_staff')->with('role', 'admin');
    }

    // Register staff
    public function store(Request $request, $role) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('staffs', 'email')],
            'password' => 'required|confirmed|min:7',
            'contact_no' => ['required', 'min:9', Rule::unique('staffs', 'contact_no')],
            'status' => ['required', 'min:3'],
            'salary' => ['required', 'min:3', 'gte:0'],
            'department' => ['required'],
        ]);

        // $formFields = array(['role' => $role, 'status' => 'active']);
        // $formFields += $formFieldsValidate;

        $formFields['role'] = $role;

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create staff
        $staff = Staff::create($formFields);

        // Login
        Auth::login($staff);

        return redirect('/')->with('message', 'Staff created and logged in');
    }
}
