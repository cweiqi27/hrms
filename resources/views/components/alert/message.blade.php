@if(session()->has('message'))
    <div class="text-rose-700">
        {{ session()->get('message') }}
    </div>
@endif