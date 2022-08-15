<x-layout.main-layout title="Home" type="index" :role="$staff->role">
    <x-layout.index-layout class="sm:h-64">
        <section class="relative flex flex-col gap-4 sm:flex-row justify-between w-full pt-2 pb-2 sm:pb-8">
            <div class="flex-1 flex flex-col gap-2">
                <x-title :name="$message"/>
                <x-subheading>
                    @if($is_closed)
                        Work starts in {{ $diff_next }}.
                    @else
                        Work ends in {{ $diff_next }}.
                    @endif
                </x-subheading>
            </div>
            <div class="hidden sm:block flex-1 sm:text-right">
                <x-subheading>
                    <x-quotes />
                </x-subheading>
            </div>
        </section>
        
        <x-layout.index-main>
            <x-card.nav-card
                route="task.show"
                title="Task"
                description="Assign task to employee"
                icon="folder-open-outline"
            />
            <x-card.nav-card
                route="leave.show"
                title="Leave"
                description="Handle leave applications"
                icon="calendar-number-outline"
            />
            <x-card.nav-card
                route="monitor.show"
                title="Monitor"
                description="Keep track of employee"
                icon="eye-outline"
            />
            <x-card.nav-card
                route="staff.profile"
                title="Profile"
                description="Your personal profile"
                icon="person-circle-outline"
            />
        </x-layout.index-main>
    </x-layout.index-layout>

</x-layout.main-layout>
