@props(['route'])
<form action="{{ route("$route") }}" method="GET" autocomplete="off">
    @csrf

    <div>
        <x-form.input name="search" labelName="Search staff" />
        <x-button.submit>Search</x-button.submit>
    </div>
    
</form>

<form action="{{ route('search.staff.all') }}" method="GET">
    @csrf

    <x-button.submit>Show all</x-button.submit>
</form>