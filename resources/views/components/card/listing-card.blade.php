<div {{ $attributes -> merge([
    'class' => 'flex flex-col gap-4 rounded py-6'
    ]) }}
>
    {{ $slot }}
</div>
