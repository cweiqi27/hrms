@props(['role'])
@stack('scripts')
<header class="sticky top-0 w-full h-14 bg-slate-50 border-b border-slate-200 px-2 md:px-4 lg:px-8">
    <nav 
        class="flex flex-none justify-between"
        x-data="{ isDropdownOpen: false }"
    >

        {{-- MOBILE VIEW --}}
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
        <div
            class="flex-none fixed top-[3.53rem] left-0 w-screen h-screen py-4 flex flex-col items-center gap-2 md:hidden bg-emerald-800"
            x-show="isDropdownOpen" 
            x-cloak   
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >

            <a href="" class="w-full py-2 text-slate-50 text-center font-semibold">TASK</a>
            <a href="{{ route('leave.show') }}" class="w-full py-2 text-slate-50 text-center font-semibold">LEAVE</a>
            <a href="{{ route('profile') }}" class="w-full py-2 text-slate-50 text-center font-semibold">PROFILE</a>
            <form class="inline" method="POST" action="/logout" class="w-full text-center">
                @csrf
                <x-button.submit class="py-2 text-slate-50 font-semibold">
                    SIGN OUT
                </x-button.submit>
            </form>
        </div>



        {{-- DESKTOP/ TABLET VIEW --}}
        <ul class="hidden md:flex gap-5 items-center">
            <li>
                <a href="/">
                    <img src="{{ asset('img/HRMS-logo_transparent.png') }}" alt="HRMS logo" class="max-w-[3.5rem]">
                </a>
            </li>
            <li>
                <a 
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="/task">
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
                    href="">
                        Monitor
                </a>
            </li>
        </ul>

        @auth
        <ul class="hidden md:flex gap-5 items-center">
            @unless($role === 'admin')
            <li class="py-3.5 px-2 font-medium text-slate-100">
                <a href="" class="rounded-md p-2 bg-emerald-600 ring-2 ring-emerald-200 hover:bg-emerald-400 hover:ring-rose-200 transition-colors duration-150">
                    Clock-In
                </a>
            </li>
            @endunless
            <li>
                <a 
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="/profile">
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