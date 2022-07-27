<div {{ $attributes -> merge([
        'class' => 'hidden md:flex flex-col flex-1 justify-center items-center 
                    rounded-l-xl w-0 bg-gradient-to-tr from-emerald-200 to-indigo-200'
        ])
}}>
  {{ $slot }}
</div>