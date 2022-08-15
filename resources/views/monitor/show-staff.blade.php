@php
    $staff_name = "Employee - " . $staff->name;
@endphp
<x-layout.main-layout :title="$staff_name" type="dashboard" :role="$staff_role" sidebarLinkType="monitor">
    <x-staff-details :staff="$staff"/>
    <a href="{{ route('monitor.edit-staff', $staff) }}">Edit</a>
</x-layout.main-layout>
