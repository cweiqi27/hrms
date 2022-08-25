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

    public function list()
    {
        return view('task.show', [
            'staff' => Auth::user()
        ]);
    }

    public function listGet(Request $request)
    {
        $task = Task::where('staff_id', '=', $request->get('staff_id'))
                    ->get();

        return view('task.show', [
            'staff' => Auth::user(),
            'task' => $task
        ]);
    }

    public function listAll()
    {
        if(Auth::user()->role === 'admin') {
            $managed_staff = Staff::select('staffs.staff_id')
                ->where('manager_id', Auth::user()->staff_id)
                ->get('staff_id')
                ->toArray();
            $task = Task::select('tasks.*')
                        ->whereIn('staff_id', $managed_staff)
                        ->where('task_status', '<>', 'completed' )
                        ->get();
        } else {
            $task = Task::where('staff_id', '=', Auth::user()->staff_id)
                ->where('task_status', '=', 'assigned' )
                ->orWhere('task_status', '=', 'accepted')
                ->orWhere('task_status', '=', 'review')
                ->get();
        }

        return view('task.show', [
            'staff' => Auth::user(),
            'task' => $task
        ]);
    }

    public function update(Request $request)
    {
        Task::find('');
        $request->input('task_status');
    }
}
