@if(session()->has('message'))
    <div {{ $attributes -> merge(['class' => 'text-rose-700']) }}>
        {{ session()->get('message') }}
    </div>
@endif