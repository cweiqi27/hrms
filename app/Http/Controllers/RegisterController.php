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
    public function create() 
    {
        return view('staff.create'); 
    }

    // Register staff
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('staffs', 'email')],
            'password' => 'required|confirmed|min:7',
            'contact_no' => ['required', 'min:9'],
            'status' => ['required', 'min:3'],
            'salary' => ['required', 'min:3'],
            'department' => ['required'],
            'role' => ['required', 'min:3'],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create staff
        $staff = Staff::create($formFields);

        // Login
        Auth::login($staff);

        return redirect('/')->with('message', 'Staff created and logged in');
    }
}
