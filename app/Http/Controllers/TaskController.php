<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Task index page
    public function show()
    {
        return view("task.index", [
            "staff" => Auth::user(),
        ]);
    }

    public function create()
    {
        $employees = Staff::where('role', '=' , 'employee')->get();
        return view("task.create", [
            "staff" => Auth::user(),
            "employees" => $employees
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'task_name' => ['required'],
            'staff_id' => ['required']
        ]);

        $formFields['task_status'] = 'assigned';
        $formFields['task_assign_date'] = Carbon::now()->toDateTimeString();

        Task::create($formFields);

        if(Auth::user()->cannot('create-task')) {
            abort(403);
        }

        return back()
            ->with([
                "staff" => Auth::user(),
                "message" => "Task successfully created."
            ])
            ->withErrors('staff_id');
    }
}
