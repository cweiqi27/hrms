<x-layout.main-layout title="Task" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <form action="{{ route('task.list-get', ['staff' => 'staff_name']) }}" method="GET">
        <x-form.select name="employee" label-name="Employee">
            @foreach($staff_list as $staff_lists)
                <option value="{{$staff_lists->staff_id}}">{{ $staff_lists->name }}</option>
            @endforeach
        </x-form.select>
        <x-button.form-submit>
            Get Task
        </x-button.form-submit>
    </form>
    <form action="{{ route('task.list-all') }}" method="GET">
        @csrf
        <x-button.form-submit>All</x-button.form-submit>
    </form>

    @unless (!isset($task))
        @foreach ($task as $tasks)
            <x-layout.card class="flex-col rounded bg-emerald-100">
                {{ $tasks->task_name }}
            </x-layout.card>
        @endforeach
    @endunless


</x-layout.main-layout>
