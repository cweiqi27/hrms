<button 
    type="submit" 
    {{ $attributes->merge([
        'class' => 'rounded-md w-full p-2 mt-8 font-medium text-slate-100 
            bg-emerald-500 hover:bg-emerald-400 transition-all duration-100']) 
    }}
>
    {{ $slot }}
</button>