<div {{ $attributes -> merge([
    'class' => 'flex flex-col gap-4 rounded px-2 py-6'
    ]) }}
>
    {{ $slot }}
</div>
