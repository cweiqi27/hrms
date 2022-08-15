<div
    {{ $attributes->merge([
        'class' => 'absolute top-0 left-0 w-full h-48 bg-emerald-50'
    ]) }}
>
</div>
<div class="flex flex-col gap-4 lg:mx-auto max-w-screen-lg">
    {{ $slot }}
</div>
