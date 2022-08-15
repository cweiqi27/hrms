@props(['titleCsv'])

@php
    $title = explode(',', $titleCsv);
@endphp

<div class="flex justify-center rounded-lg mt-4 p-2 shadow-lg shadow-gray-400">
    <table class="table-auto border-separate">
        <thead class="bg-slate-700 text-slate-50">
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

