<x-layout.main-layout title="Monitor" type="dashboard" :role="$staff_role" linksCsv="here,is,something">
    <x-layout.card>
        <a href="{{ route('search.staff') }}">Search</a>
    </x-layout.card>
    
</x-layout.main-layout>