<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    // Home page
    public function home()
    {
        $current = Carbon::now();
        $current_time = Carbon::now()->format("h:i");
        $noon = Carbon::createFromTime("12");
        $is_closed = Carbon::parse($current)->isClosed();

        // Difference between opening/closing hour from now
        $is_closed
            ? $next_open_or_close = Carbon::nextOpen()
            : $next_open_or_close = Carbon::nextClose();

        $diff_hour_next = Carbon::parse($current)->diffInRealHours($next_open_or_close);
        $diff_min_next = Carbon::parse($current)->diffInRealMinutes($next_open_or_close);


        if ($diff_min_next > 1) {
            if ($diff_hour_next > 1) {
                $diff_next = $diff_hour_next . " hours";
            } elseif ($diff_hour_next === 1) {
                $diff_next = $diff_hour_next . " hour";
            } else {
                $diff_next = $diff_min_next . " minutes";
            }
        } else {
            $diff_next = $diff_min_next . " minute";
        }

        // Greet type
        $current < $noon
            ? $greet = "morning"
            : $greet = "afternoon";


        // Greet message
        if (Carbon::isBusinessClosed()) {
            $message = "Hey, " . Auth::user()->name . ". Take a rest.";
        } else {
            $message = "Good " . $greet . ", " . Auth::user()->name . ".";
        }

        return view("staff.index", [
            "staff" => Auth::user(),
            "message" => $message,
            "time_now" => $current_time,
            "next_open_or_close" => $next_open_or_close->format("h:i"),
            "diff_next" => $diff_next,
            "is_closed" => $is_closed,
        ]);
    }

    // Profile page
    public function profile()
    {
        return view("staff.profile", [
            "staff" => Auth::user(),
        ]);
    }

    // Edit profile page
    public function edit()
    {
        return view("staff.edit", [
            "staff" => Auth::user(),
        ]);
    }

    // Update profile
    public function update(Request $request)
    {
        $staff = Staff::find(Auth::user()->staff_id);

        $request->validate([
            'name' => ['required', 'min:3'],
            "contact_no" => [
                "required",
                "min:9",
                Rule::unique("staffs", "contact_no"),
            ],
            'email' => ['required']
        ]);

        $staff->name = $request->input('name');
        $staff->contact_no = $request->input('contact_no');
        $staff->email = $request->input('email');

        if ($request->input('email') !== Auth::user()->email)
            $staff->email_verified_at = null;

        $staff->save();

        return back()
            ->withErrors('Error')
            ->withMessage('Profile successfully updated.');

    }

    // Security page
    public function security()
    {
        return view("staff.security", [
            'staff' => Auth::user()
        ]);
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'password_current' => ['required']
        ]);

        $old_password = $request->input('password_current');
        $staff = Staff::find(Auth::user()->staff_id);

        if(! Hash::check($old_password, $staff->password)) {
            return back()->withMessage('Password changed success.');
        }

        return back()
            ->withErrors([
                'password_current' => "Incorrect old password"
            ]);
    }
}
