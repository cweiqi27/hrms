<x-layout.main-layout title="Task - Create" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <x-title name="Create Task" />

    <form action="{{ route('task.store')  }}" method="POST" autocomplete="off">
        @csrf
        <x-form.select labelName="Employee" name="staff_id">
            @foreach($employees as $employee)
                <option value="{{ $employee->staff_id }}">{{ $employee->name }}</option>
            @endforeach
        </x-form.select>
        <x-form.input labelName="Task name" name="task_name" />
        <x-button.form-submit>Create</x-button.form-submit>
    </form>

</x-layout.main-layout>
