@props(['leaves'])

<div class="overflow-x-auto m-5">
    <table class="table-auto border border-separate border-slate-400">
        <thead class="bg-slate-100 text-slate-600">
            <tr>
                <th class="p-3 border border-slate-300">{{$leaves->leave_id}}</th>
                <th class="p-3 border border-slate-300">{{$leaves->leave_start_date}}</th>
                <th class="p-3 border border-slate-300">{{$leaves->employee_id}}</th>
            </tr>
        </thead>
        <tbody class="text-slate-600">
            <tr>
                <td class="p-3 border border-slate-300">Test 🤓</th>
                <td class="p-3 border border-slate-300">Test 🤓</th>
                <td class="p-3 border border-slate-300">Test 🤓</th>
            </tr>
            <tr>
                <td class="p-3 border border-slate-300">Test 🤓</th>
                <td class="p-3 border border-slate-300">Test 🤓</th>
                <td class="p-3 border border-slate-300">Test 🤓</th>
            </tr>
            <tr>
                <td class="p-3 border border-slate-300">Test 🤓</th>
                <td class="p-3 border border-slate-300">Test 🤓</th>
                <td class="p-3 border border-slate-300">Test 🤓</th>
            </tr>
        </tbody>
    </table>
</div>