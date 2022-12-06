@stack('scripts')
<header class="z-50 sticky top-0 w-full h-14 bg-slate-50 border-b border-slate-200 px-2 md:px-4 lg:px-8">
    <nav
        class="flex flex-none justify-between"
        x-data="{ isDropdownOpen: false }"
    >

        {{-- MOBILE VIEW --}}
        <x-layout.header-mobile :role="$role"/>

        {{-- DESKTOP/ TABLET VIEW --}}
        <ul class="hidden md:flex gap-5 items-center">
            <li>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/HRMS-logo_transparent.png') }}" alt="HRMS logo" class="max-w-[3.5rem]">
                </a>
            </li>
            <li>
                <a
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li>
                <a
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="{{ route('task.show') }}">
                        Task
                </a>
            </li>
            <li>
                <a
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="{{ route('leave.show') }}">
                        Leave
                </a>
            </li>
            <li>
                <a
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="{{ route('monitor.show') }}">
                        Monitor
                </a>
            </li>
        </ul>

        @auth
        <ul class="hidden md:flex gap-5 items-center">
            @unless($role === 'admin')
                @can('clock-in')
                    <li class="font-medium text-slate-100">
                        <form action="{{ route('clockin') }}" method="POST">
                            @csrf
                            <x-button.submit
                                class="rounded-md p-2 bg-emerald-600 ring-2 ring-emerald-200 hover:bg-emerald-400
                                    hover:ring-rose-200 transition-colors duration-150"
                            >
                                Clock-In
                            </x-button.submit>
                        </form>
                    </li>
                @endcan
                @cannot('clock-in')
                    <li class="font-medium text-slate-100">
                        <form action="{{ route('clockout') }}" method="POST">
                            @csrf
                            <x-button.submit
                                class="rounded-md p-2 bg-emerald-600 ring-2 ring-emerald-200 hover:bg-emerald-400
                                hover:ring-rose-200 transition-colors duration-150"
                            >
                                Clock-Out
                            </x-button.submit>
                        </form>
                    </li>
                @endcannot
            @endunless

            <li>
                <a
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="{{ route('staff.profile') }}">
                        Profile
                </a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <x-button.submit class="max-h-14 py-4 hover:border-b-4 border-rose-700 text-slate-600 hover:text-rose-500 transition-colors duration-150">
                        Sign Out
                    </x-button.submit>
                </form>
            </li>
        </ul>
        @else
        <ul class="hidden md:flex gap-5 items-center">
            <li>
                <a
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="/register">
                        Register
                </a>
            </li>
            <li>
                <a class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="/login">
                        Login
                </a>
            </li>
        </ul>
        @endauth

    </nav>
</header>
