<x-layout.main-layout title="Monitor" type="dashboard" :role="$staff_role" sidebarLinkType="monitor">
    <x-search route="search.staff.get"/>
    @unless (!isset($staff_details)) 
        @if (isset($query))
            <p>Search results for {{ $query }}:</p>
        @endif
    
        <x-table titleCsv="Name,Email,Verified,Contact No,Department,Salary,Action">
            @foreach ($staff_details as $staffs)
            <tr>
                <td class="p-3 border border-slate-300">
                    <a href="{{ route('monitor.show-staff', $staffs) }}"> {{ $staffs->name }} </a>
                </td>
                <td class="p-3 border border-slate-300">{{ $staffs->email }}</td>
                @if (isset($staffs->email_verified_at))
                    <td class="p-3 border border-slate-300">{{ $staffs->email_verified_at }}</td>
                @else
                    <td class="p-3 border border-slate-300">Not verified</td>
                @endif
                <td class="p-3 border border-slate-300">{{ $staffs->contact_no }}</td>
                <td class="p-3 border border-slate-300">{{ $staffs->department }}</td>
                <td class="p-3 border border-slate-300">{{ $staffs->salary }}</td>
            </tr>
            @endforeach
        </x-table>
        
        
    @endunless

    @if(isset($message))
        {{ $message }}
    @endif
    
</x-layout.main-layout>