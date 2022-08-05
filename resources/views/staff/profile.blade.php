@php
    $firstName = strtok($staff->name, ' ');
    $profileTitle = "Profile -" . " " . $firstName; 
@endphp

<x-layout.main-layout :title="$profileTitle" type="dashboard" :role="$staff->role" sidebarLinkType="profile">
    <section>
        <x-staff-details :staff="$staff" />
    </section>
</x-layout.main-layout>