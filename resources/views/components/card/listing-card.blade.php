<x-layout.card {{ $attributes -> merge([
    'class' => 'flex-col items-center gap-4 rounded'
    ]) }}
>
    {{ $slot }}
</x-layout.card>
