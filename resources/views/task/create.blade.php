<x-layout.main-layout title="Task - Create" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
        <x-title name="Create Task" />
        <div class="mt-8">
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
        </div>
    </section>

</x-layout.main-layout>
