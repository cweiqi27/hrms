<x-layout.main-layout title="Monitor" type="index" :role="$staff->role" sidebarLinkType="monitor">
    <x-layout.index-layout>
        <x-layout.index-heading
            heading="Monitor"
            subheading="Make sure everyone stays productive, we got work to do!"
        />
        <x-layout.index-main>
            <x-card.nav-card
                route="search.staff"
                title="Search"
                description="Find employee by either id or name"
                icon="search-circle-outline"
            />
            <x-card.nav-card
                route="search.staff"
                title="Payroll"
                description="Manage employee pay"
                icon="cash-outline"
            />
            <x-card.nav-card
                route="search.staff"
                title="Attendance"
                description="Keep track of employee attendance"
                icon="time-outline"
            />
            <x-card.nav-card
                route="search.staff"
                title="Performance"
                description="Evaluate employee performance"
                icon="trending-up-outline"
            />
        </x-layout.index-main>
    </x-layout.index-layout>
</x-layout.main-layout>
