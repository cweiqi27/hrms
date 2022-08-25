<x-layout.main-layout title="Task" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <form action="{{ route('task.list-all') }}" method="GET">
        @csrf
        <x-button.form-submit>All</x-button.form-submit>
    </form>
    @unless (!isset($task))
        @foreach ($task as $tasks)
            {{ $tasks->task_name }}
        @endforeach
    @endunless


</x-layout.main-layout>
