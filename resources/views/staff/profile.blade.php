<x-layout.main-layout title="Profile" type="dashboard" :role="$staff->role" sidebarLinkType="profile">
    <section>
        <x-staff-details :staff="$staff" />
    </section>
</x-layout.main-layout>