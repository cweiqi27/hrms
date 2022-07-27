<section 
  {{ 
    $attributes
      -> merge([
        'class' => 'flex justify-center max-w-screen-lg h-[34rem] mt-8 mx-auto md:shadow-xl md:shadow-slate-300'
      ]) 
  }}
>
  {{ $slot }}
</section>