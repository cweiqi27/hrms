@props(['type'])

<main 
    @if($type === 'dashboard')
        {{ $attributes->merge(['class' => 'm-4 flex flex-col gap-4 lg:pl-[11rem]']) }}
    @elseif($type === 'auth')
        {{ $attributes->merge(['class' => '']) }}
    @endif
>
    {{ $slot }}
</main>