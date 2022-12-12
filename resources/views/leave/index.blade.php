<x-layout.main-layout title="Leave" type="index" :role="$staff->role" sidebarLinkType="leave">
    <x-layout.index-layout>
        <x-layout.index-heading
            heading="Leave"
            subheading="Apply and manage leave applications."
        />
        <x-layout.index-main>
            @if($staff->role === 'admin')
                <x-card.nav-card
                    route="leave.admin-manage"
                    title="Manage Leave"
                    description="Review employee leave request"
                    icon="clipboard-outline"
                />
            @else
                <x-card.nav-card
                    route="leave.create"
                    title="Apply leave"
                    description="Request and apply for leave"
                    icon="clipboard-outline"
                />
                <x-card.nav-card
                    route="leave.show"
                    title="Leave List"
                    description="List of leaves applied and corresponding statuses"
                    icon="clipboard-outline"
                />
            @endif
        </x-layout.index-main>
    </x-layout.index-layout>
</x-layout.main-layout  >
