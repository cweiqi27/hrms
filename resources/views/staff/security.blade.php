<x-layout.main-layout title="Profile - Security" type="dashboard" :role="$staff->role" sidebarLinkType="profile">
    <x-layout.index-main>
        <x-card.nav-card
            route="task.show"
            title="Change Password"
            description="Change to a new password"
            icon="folder-open-outline"
        />

        <x-card.nav-card
            route="task.show"
            title="Deactivate Account"
            description="Deactivate this account"
            icon="folder-open-outline"
        />
    </x-layout.index-main>
</x-layout.main-layout>
