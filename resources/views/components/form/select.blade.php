@props(['labelName','name'])

<label
    for="{{ $name }}"
    class="text-gray-600 text-sm font-semibold"
>
    {{ $labelName }}
</label>

<select
    name="{{ $name }}"
    id="{{ $name }}"
    class="mt-2 mb-8 w-full px-3 py-2 border-2 rounded-md"
    >
    {{ $slot }}
</select>
