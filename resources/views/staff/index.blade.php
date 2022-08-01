<x-layout.main-layout title="Home" type="dashboard" :role="$staff_role">
    <x-title :name="$message" />
    
    @if ($is_closed)
    <p class="">
        Work starts in {{ $diff_next }} ({{ $next_open_or_close }} a.m.).
    </p>
    @else
    <p class="">
        Work ends in {{ $diff_next }} ({{ $next_open_or_close }} p.m.).
    </p>
    @endif
    
    {{ $time_now }}
    <x-quotes />

</x-layout.main-layout>