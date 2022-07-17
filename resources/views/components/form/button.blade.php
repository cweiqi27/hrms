<button type="submit" {{ $attributes->merge(['class' => 'p-2 text-slate-700 font-medium']) }}>
    {{ $slot }}
</button>