@props(['legend'])
<div class="flex gap-4 items-center my-2">
    <div {{ $attributes -> merge([ 'class' => 'rounded p-4']) }}></div>
    <h2 class="text-slate-700 font-medium">{{ $legend }}</h2>
</div>
