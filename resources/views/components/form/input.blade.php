@props(['labelName', 'name'])

<x-form.label class="label" :labelName="$labelName" :name="$name" />

<input  
    placeholder="{{ $labelName }}"
    name="{{ $name }}"
    id="{{ $name }}"
    {{ $attributes->merge(['value' => old($name), 'class' => 'my-2 w-full px-3 py-2 border-2 rounded-md']) }}
>

<x-form.error name="{{ $name }}" />
