@php
    $staff_name = "Employee - " . $staff->name;
@endphp
<x-layout.main-layout :title="$staff_name" type="dashboard" :role="$staff->role" sidebarLinkType="monitor">
    <x-staff-details :staff="$staff"/>
</x-layout.main-layout>