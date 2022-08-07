<x-layout.main-layout title="Home" type="dashboard" :role="$staff->role">
<main class="flex flex-col gap-4 lg:mx-8">
    <x-title :name="$message"/>
    <x-subheading>
        @if($is_closed)
            Work starts in {{ $diff_next  }} ({{ $next_open_or_close }} a.m.).
        @else
            Work ends in {{ $diff_next }} ({{ $next_open_or_close }} p.m.).
        @endif
    </x-subheading>
    {{ $time_now }}
    <x-quotes />
</main>

</x-layout.main-layout>
