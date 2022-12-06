@props(['titleCsv'])

{{--Pass in a csv as the title and header of the table--}}
@php
    $title = explode(',', $titleCsv);
@endphp

<div class="flex justify-center rounded-lg mt-4 shadow-lg shadow-gray-400">
    <table class="table-auto border-separate">
        <thead class="bg-emerald-700 text-emerald-50">
            <tr>
                @foreach ($title as $titles)
                    <th class="p-3 ">{{ $titles }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-slate-600">
            {{ $slot }}
        </tbody>
    </table>
</div>

