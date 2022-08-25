<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClockInController extends Controller
{
    public function clockIn(Request $request)
    {
        $diff_hour_next = Carbon::parse(Carbon::now())->diffInRealHours(Carbon::nextOpen());

        if(! $request->session()->exists('clock-in') && Carbon::isBusinessOpen()) {
            $request->session()->put('clock-in', Carbon::now()->toDateTimeString());
            return back()
                ->with([
                    'staff' => Auth::user()->staff_id,
                    'success' => 'You clocked-in.'
                ]);
        } else {
            return back()
                ->with([
                    'staff' => Auth::user()->staff_id,
                    'info' => 'You still have ' . $diff_hour_next . ' hours before you can clock in.'
                ]);
        }

    }

    public function clockOut(Request $request)
    {
        $diff_hour_next = Carbon::parse(Carbon::now())->diffInRealHours(Carbon::nextClose());

        if($request->session()->has('clock-in') && Carbon::isBusinessClosed()) {

            Attendance::create([
                'date' => Carbon::now()->toDateString(),
                'clock_in_time' => $request->session()->get('clock-in'),
                'clock_out_time' => Carbon::now()->toDateTimeString(),
                'staff_id' => Auth::user()->staff_id
            ]);

            $request->session()->forget('clock-in');


            return back()
                ->with([
                    'staff' => Auth::user()->staff_id,
                    'success' => 'You clocked-out.'
                ]);
        } else {
            return back()
                ->with([
                    'staff' => Auth::user()->staff_id,
                    'info' => 'You still have ' . $diff_hour_next . ' hours before you can clock out.'
                ]);
        }
    }
}
