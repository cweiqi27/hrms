@stack('scripts')

<main 
    @if($type === 'dashboard')
        @if(isset($sidebarLinkType))
            {{ $attributes->merge(['class' => 'm-4 flex flex-col gap-4 lg:pl-[11rem]']) }}
        @else
            {{ $attributes->merge(['class' => 'm-4 flex flex-col gap-4']) }}
        @endif
    @elseif($type === 'auth')
        {{ $attributes->merge([
                'class' => 'pb-[20rem] sm:pb-40', 
            ]) 
        }}
    @endif
>
    {{ $slot }}
</main>

