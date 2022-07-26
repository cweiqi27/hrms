@props(['name'])

<h1 {{ $attributes -> merge(['class' => 'text-3xl']) }}>{{ $name }}</h1>