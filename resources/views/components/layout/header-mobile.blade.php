<ul class="flex items-center md:hidden">
    <li>
        <a href="/">
            <img src="{{ asset('img/HRMS-logo_transparent.png') }}" alt="HRMS logo" class="max-w-[3.5rem]">
        </a>
    </li>
</ul>

<button
    class="md:hidden"
    x-on:click="isDropdownOpen = ! isDropdownOpen"
>
    <ion-icon
        name="menu-outline"
        class="px-4 text-lg"
    />
</button>

{{--Dropdown--}}
<div
    class="flex-none fixed top-[3.53rem] left-0 w-screen h-screen
            flex flex-col items-center md:hidden bg-emerald-800"
    x-show="isDropdownOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
>
    @unless($role === 'admin')
        @can('clock-in')
            <form
                action="{{ route('clockin') }}"
                method="POST"
            >
                @csrf
                <button
                    class="w-full py-4 text-slate-50 text-center font-semibold
                        border-b-2 border-emerald-600 border-dotted"
                >
                    Clock In
                </button>
            </form>
        @endcan
        @cannot('clock-in')
            <form
                action="{{ route('clockout') }}"
                method="POST"
            >
                @csrf
                <button
                    class="w-full py-4 text-slate-50 text-center font-semibold
                    border-b-2 border-emerald-600 border-dotted"
                >
                    Clock In
                </button>
            </form>
        @endcannot
    @endunless

    <a href="{{ route('home') }}" class="w-full py-4 text-slate-50 text-center font-semibold border-b-2 border-emerald-600 border-dotted">Home</a>

    <a href="" class="w-full py-4 text-slate-50 text-center font-semibold border-b-2 border-emerald-600 border-dotted">Task</a>
    <a href="{{ route('leave.show') }}" class="w-full py-4 text-slate-50 text-center font-semibold border-b-2 border-emerald-600 border-dotted">Leave</a>
    <a href="{{ route('monitor.show') }}" class="w-full py-4 text-slate-50 text-center font-semibold border-b-2 border-emerald-600 border-dotted">Monitor</a>
    <a href="{{ route('staff.profile') }}" class="w-full py-4 text-slate-50 text-center font-semibold border-b-2 border-emerald-600 border-dotted outline-">Profile</a>

    <form class="inline" method="POST" action="/logout">
        @csrf
        <x-button.submit class="rounded-full mt-4 p-4 bg-rose-200 border-8 border-double border-rose-50
                                text-gray-700 font-bold">
            Sign out
        </x-button.submit>
    </form>
</div>
