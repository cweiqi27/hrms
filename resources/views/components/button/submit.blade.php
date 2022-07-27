<button type="submit" {{ $attributes->merge(['class' => 'p-2 font-medium']) }}>
    {{ $slot }}
</button>