@props(['labelName', 'name'])

<div class="relative">
    <input
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge([
            'value' => old($name),
            'class' => 'mb-10 w-full px-3 py-2 border-2 rounded-md
                        outline-none outline-offset-0 focus:outline-none
                        invalid:border-red-500 out-of-range:border-red-500
                        required:border-yellow-500 read-only:bg-indigo-100
                        peer placeholder-transparent caret-indigo-300
                        ',
            'placeholder' => $labelName
            ])
        }}
    >
    <x-form.label class="label" :labelName="$labelName" :name="$name" />

    <x-form.error name="{{ $name }}" class="-translate-y-10 translate-x-1.5" />
</div>
