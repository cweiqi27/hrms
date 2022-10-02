<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    public function show()
    {
        dd (
          Session::all()
        );
        return view("leave.index", [
            "staff" => Auth::user(),
        ]);
    }
}
