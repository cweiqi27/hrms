@props(['labelName','name'])

<x-form.label :name="$name" :labelName="$labelName" />

<select 
    name="{{ $name }}" 
    id="{{ $name }}"
    class="my-2 w-full px-3 py-2 border-2 rounded-md"
    >
    {{ $slot }}
</select>