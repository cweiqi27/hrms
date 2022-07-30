<section 
  {{ 
    $attributes
      -> merge([
        'class' => 'flex justify-center max-w-screen-lg md:mt-8 mb-12 mx-auto md:shadow-xl md:shadow-slate-300'
      ]) 
  }}
>
  {{ $slot }}
</section>