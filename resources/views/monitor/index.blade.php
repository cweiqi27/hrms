<x-layout.main-layout title="Monitor" type="index" :role="$staff->role" sidebarLinkType="monitor">
    <x-layout.index-layout>
        @if($staff->role === 'admin')
            <x-layout.index-heading
                heading="Monitor"
                subheading="Making sure everyone stays productive."
            />
            <x-layout.index-main>
                <x-card.nav-card
                    route="search.staff"
                    title="Search"
                    description="Find employee by either id or name"
                    icon="search-circle-outline"
                />
                <x-card.nav-card
                    route="payroll.show"
                    title="Payroll"
                    description="Manage employee pay"
                    icon="cash-outline"
                />
                <x-card.nav-card
                    route="attendance.show"
                    title="Attendance"
                    description="Keep track of employee attendance"
                    icon="time-outline"
                />
                <x-card.nav-card
                    route="performance.show"
                    title="Performance"
                    description="Evaluate employee performance"
                    icon="bar-chart-outline"
                />
            </x-layout.index-main>
        @else
            <x-layout.index-heading
                heading="Monitor"
                subheading="Making sure we stay productive."
            />
            <x-layout.index-main>
                <x-card.nav-card
                    route="payroll.show"
                    title="Payroll"
                    description="Check salary and pay"
                    icon="cash-outline"
                />
                <x-card.nav-card
                    route="attendance.show"
                    title="Attendance"
                    description="Keep track of attendance"
                    icon="time-outline"
                />
                <x-card.nav-card
                    route="performance.show"
                    title="Performance"
                    description="Evaluate performance"
                    icon="bar-chart-outline"
                />
            </x-layout.index-main>
        @endif
    </x-layout.index-layout>
</x-layout.main-layout>
