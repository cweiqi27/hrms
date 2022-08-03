<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    // Search staff 
    public function searchStaff()
    {
        $staff_role = Auth::user()->role;
        return view("monitor.search-staff", ["staff_role" => $staff_role]);
    }

    public function searchStaffGet(Request $request)
    {
        // $searchField = $request->validate([
        //     'search' => ['required'],
        // ]);

        $staff_role = Auth::user()->role;
        $query = $request->input("search");

        $staff = Staff::where("name", "LIKE", "%" . $query . "%")
            ->orWhere("email", "LIKE", "%" . $query . "%")
            ->get();

        return (count($staff) > 0 && $query !== null)
            ? view("monitor.search-staff", [
                "staff_role" => $staff_role,
                "staff_details" => $staff,
                "query" => $query,
            ])
            : view("monitor.search-staff", [
                "staff_role" => $staff_role,
                "message" => "No record found.",
            ]);
    }

    public function searchStaffAll(Request $request)
    {
        $staff_role = Auth::user()->role;
        $staff = Staff::all();

        return count($staff) > 0
            ? view("monitor.search-staff", [
                "staff_role" => $staff_role,
                "staff_details" => $staff,
            ])
            : view("monitor.search-staff", [
                "staff_role" => $staff_role,
                "message" => "No record found.",
            ]);
    }
}
