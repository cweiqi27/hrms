@stack('scripts')

<main
    @if($type === 'dashboard')
        @if(isset($sidebarLinkType))
            {{ $attributes->merge(['class' => 'relative flex flex-col gap-4 lg:pl-[11rem]']) }}
        @else
            {{ $attributes->merge(['class' => 'relative flex flex-col gap-4']) }}
        @endif
    @elseif($type === 'index')
        @if(isset($sidebarLinkType))
            {{ $attributes->merge(['class' => 'relative min-h-screen p-4 lg:pl-[11rem] bg-emerald-100']) }}
        @else
            {{ $attributes->merge(['class' => 'relative min-h-screen bg-emerald-100']) }}
        @endif
    @else
        {{ $attributes->merge([
                'class' => 'pb-[20rem] sm:pb-40',
            ])
        }}
    @endif
>
    {{ $slot }}
</main>

