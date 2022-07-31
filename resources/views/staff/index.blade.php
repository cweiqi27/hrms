<x-layout.main-layout title="Home" type="dashboard">
    <x-title :name="$message" />
    <x-quotes />
    
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

</x-layout.main-layout>