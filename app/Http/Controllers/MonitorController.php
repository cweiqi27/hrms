<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;

class MonitorController extends Controller
{
    public function show() {
        return view('monitor.index', [
            'staff_role' => Auth::user()->role,
        ]);
    }
}
