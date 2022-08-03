<x-layout.main-layout title="Monitor" type="dashboard" :role="$staff_role" sidebarLinkType="monitor">
    <x-layout.card>
        <a href="{{ route('search.staff') }}">Search</a>
    </x-layout.card>
    
</x-layout.main-layout>