<div {{ $attributes -> merge([
          'class' => 'flex flex-col flex-1 gap-8 justify-around rounded-r-xl 
            max-w-sm md:max-w-none py-4 px-2 md:px-12 md:pb-12 bg-white'
    ]) 
}}>
  {{ $slot }}
</div>
