<x-layout>
    <h1 class="text-3xl">test</h1>

        @foreach ($leave as $leaves)
            <p>{{$leaves->leave_id}}</p>
            <p>{{$leaves->leave_end_date}}</p>
            <x-table :leaves="$leaves" />
        @endforeach

    <x-forms /> 
</x-layout>