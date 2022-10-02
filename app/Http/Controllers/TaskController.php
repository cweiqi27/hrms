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
            "staff" => Auth::user()
        ]);
    }

    public function create()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();
        return view("task.create", [
            "staff" => Auth::user(),
            "managed_staff" => $managed_staff,
        ]);
    }

    public function store(Request $request)
    {
        if($request->get('staff_id') == "") back()->withError('Please select an employee.');

        $formFields = $request->validate([
            'task_name' => ['required'],
            'staff_id' => ['required', 'gte:1']
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
                    "success" => "Task successfully created."
                ]);
    }

    public function list()
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();

        $task = Task::where('staff_id', '=', Auth::user()->staff_id)
            ->where('task_status', '<>', 'completed')
            ->get();

        return Auth::user()->role === 'admin'
            ? view('task.show', [
                'staff' => Auth::user(),
                'managed_staff' => $managed_staff
            ])
            : view('task.show', [
                'staff' => Auth::user(),
                'task' => $task,
                'task_count' => count($task),
                'message_type' => 'info'
            ]);
    }

    public function listGet(Request $request)
    {
        $managed_staff = Staff::select('staffs.*')
            ->where('manager_id', Auth::user()->staff_id)
            ->get();

        $task = Task::where('staff_id', '=', $request->get('employee'))
                    ->where('task_status', '<>', 'completed' )
                    ->get();

        $employee = Staff::where('staff_id', '=', $request->get('employee'))
                        ->get();

        return view('task.show', [
                'staff' => Auth::user(),
                'task' => $task,
                'task_count' => count($task),
                'managed_staff' => $managed_staff,
                'employee' => $employee,
                'message_type' => 'info'
            ]);
    }

    public function update(Request $request)
    {
        $task = Task::find($request->input('task'));
        $task->task_status = $request->input('status');

        if($request->input('status') === 'accepted')
            $task->task_start_date = Carbon::now()->toDateTimeString();

        if($request->input('status') === 'completed')
            $task->task_end_date = Carbon::now()->toDateTimeString();

        $task->save();

        return back()
            ->withErrors('Error')
            ->withSuccess('Task status successfully updated.');
    }

    public function delete(Request $request)
    {
        Task::find($request->input('task'))->delete();

        return back()
            ->withErrors('Error')
            ->withSuccess('Task successfully deleted.');
    }
}
