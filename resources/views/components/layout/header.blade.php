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
            class="fixed top-[3.53rem] left-0 w-screen h-screen py-4 flex flex-col items-center gap-2 md:hidden bg-white"
            x-show="isDropdownOpen" 
            x-cloak   
        >
            <a href="" class="w-full text-slate-800 text-center font-semibold">TASK</a>
            <a href="{{ route('leave') }}" class="w-full text-slate-800 text-center font-semibold">LEAVE</a>
            <a href="{{ route('profile') }}" class="w-full text-slate-800 text-center font-semibold">PROFILE</a>
            <form class="inline" method="POST" action="/logout" class="w-full text-slate-800 text-center font-semibold">
                @csrf
                <x-button.submit>
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
                    href="/leave">
                        Leave
                </a>
            </li>
            <li>
                <a 
                    class="py-3.5 px-2 font-medium text-slate-600 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer"
                    href="/leave">
                        Monitor
                </a>
            </li>
        </ul>

        @auth
        <ul class="hidden md:flex gap-5 items-center">
            <li class="py-3.5 px-2 font-medium text-slate-100">
                <a href="" class="rounded-md p-2 bg-emerald-600 ring-2 ring-emerald-200 hover:bg-emerald-400 hover:ring-rose-200 transition-colors duration-150">
                    Clock-In
                </a>
            </li>
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