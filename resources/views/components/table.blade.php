@props(['titleCsv'])

@php
    $title = explode(',', $titleCsv);
@endphp

<div class="overflow-x-auto m-5">
    <table class="table-auto border border-separate border-slate-400">
        <thead class="bg-slate-100 text-slate-600">
            <tr>
                @foreach ($title as $titles)
                    <th class="p-3 border border-slate-300">{{ $titles }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-slate-600">
            {{ $slot }}
        </tbody>
    </table>
</div>