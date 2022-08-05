<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function show()
    {
        return view("leave.index", [
            "staff" => Auth::user(),
        ]);
    }
}
