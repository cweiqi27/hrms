<x-layout.main-layout title="Task" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <x-title name="Task" />
    <a href="{{ route('task.create') }}">create</a>
</x-layout.main-layout>
