@php
    $firstName = strtok($staff->name, ' ');
    $profileTitle = "Profile -" . " " . $firstName;
@endphp

<x-layout.main-layout :title="$profileTitle" type="index" :role="$staff->role" sidebarLinkType="profile">
    <x-layout.index-layout>
        <x-layout.index-heading heading="Profile" subheading="Account Information">
        </x-layout.index-heading>
        <x-layout.index-main>
            <x-staff-details :staff="$staff" />
        </x-layout.index-main>
    </x-layout.index-layout>
</x-layout.main-layout>
