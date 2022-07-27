@props(['labelName', 'name'])

<x-form.label class="label" :labelName="$labelName" :name="$name" />

<input  
    name="{{ $name }}"
    id="{{ $name }}"
    {{ $attributes->merge([
        'value' => old($name), 
        'class' => 'mb-4 w-full px-3 py-2 border-2 rounded-md 
                    outline-none outline-offset-0 focus:outline-indigo-300 transition-all',
        'placeholder' => $labelName            
        ]) 
    }}
>

<x-form.error name="{{ $name }}" />
