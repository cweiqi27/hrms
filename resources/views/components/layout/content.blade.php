@props(['type'])
@stack('scripts')

<main 
    @if($type === 'dashboard')
        {{ $attributes->merge(['class' => 'm-4 flex flex-col gap-4 lg:pl-[11rem]']) }}
    @elseif($type === 'auth')
        {{ $attributes->merge([
                'class' => 'pb-60 sm:pb-24', 
            ]) 
        }}
    @endif
>
    {{ $slot }}
</main>

