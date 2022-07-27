@props(['name'])

<h1 {{ $attributes -> merge(['class' => 'text-3xl text-slate-700 font-semibold cursor-default']) }}>
    {{ $name }}
</h1>