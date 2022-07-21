@props(['type'])

<main {{ 
    ($type === 'dashboard')
        ? $attributes->merge(['class' => 'm-4 flex flex-col gap-4 lg:pl-[11rem]'])
        : $attributes->merge(['class' => 'm-4 flex flex-col gap-4'])
}}>
    {{ $slot }}
</main>