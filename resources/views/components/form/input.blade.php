@props(['name'])

<x-form.label class="label" name="{{ $name }}" />

<input  
    class="my-2 w-full px-3 py-2 border-2 rounded-md" 
    type="{{ $name }}" 
    name="{{ $name }}" 
    id="{{ $name }}"
    {{ $attributes(['value' => old($name)]) }}
>

<x-form.error name="{{ $name }}" />
