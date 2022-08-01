<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login page
    public function login()
    {
        return view("staff.login");
    }

    // Login staff
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials, $request->get("remember_me"))) {
            $request->session()->regenerate();

            return redirect()->intended("/");
        }

        return back()
            ->withErrors([
                "password" => "Invalid Email or Password.",
            ])
            ->onlyInput("email");
    }

    // Logout staff
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
