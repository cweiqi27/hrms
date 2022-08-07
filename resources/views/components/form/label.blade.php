@props(['labelName','name'])

<label
    class="absolute left-1.5 -top-6 text-gray-600 text-sm font-semibold cursor-text
            peer-placeholder-shown:text-base peer-placeholder-shown:top-2
            peer-placeholder-shown:text-gray-400 peer-placeholder-shown:font-normal
            peer-focus:-top-6 peer-focus:text-sm peer-focus:text-gray-600
            peer-focus:font-semibold transition-all"
    for="{{ $name }}">
    {{ $labelName }}
</label>
