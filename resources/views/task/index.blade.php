@php
    $staff->role === 'admin'
        ? $subheading = "Assign task appropriately according to employee's strengths."
        : $subheading = "Perform the assigned tasks with all your might."
@endphp

<x-layout.main-layout title="Task" type="index" :role="$staff->role" sidebarLinkType="task">
    <x-layout.index-layout>
        <x-layout.index-heading
            heading="Task"
            :subheading="$subheading"
        />
        <x-layout.index-main>
            @if($staff->role === 'admin')
                <x-card.nav-card
                    route="task.create"
                    title="Create Task"
                    description="Assign task to employee"
                    icon="clipboard-outline"
                />
                <x-card.nav-card
                    route="task.list"
                    title="Review"
                    description="Review assigned task"
                    icon="checkbox-outline"
                />
            @else
                <x-card.nav-card
                    route="task.list"
                    title="Task List"
                    description="List of tasks assigned to be completed"
                    icon="clipboard-outline"
                />
            @endif
        </x-layout.index-main>
    </x-layout.index-layout>
</x-layout.main-layout>
