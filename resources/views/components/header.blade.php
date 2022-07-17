{{-- @php
    $first_name = strtok($first_name, " ");

@endphp --}}

<header class="sticky top-0 w-full max-h-14 bg-slate-50 border-b border-slate-200 lg:px-8">
    <nav class="flex flex-none justify-between">
        <ul class="flex gap-5">
            <li>
                <a href="/"><img src="{{ asset('img/HRMS-logo_transparent.png') }}" alt="HRMS logo" class="max-w-[3.5rem]"></a>
            </li>
            <li class="max-h-14 py-4 px-2 font-medium text-slate-700 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer">
                <a href="/task">Task</a>
            </li>
            <li class="max-h-14 py-4 px-2 font-medium text-slate-700 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer">
                <a href="/leave">Leave</a>
            </li>
            <li class="max-h-14 py-4 px-2 font-medium text-slate-700 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer">
                <a href="/leave">Monitor</a>
            </li>
        </ul>

        @auth
        <ul class="flex gap-5">
            <li class="max-h-14  py-4 px-2 font-medium text-slate-100">
                <a href="" class="rounded-md p-2 bg-emerald-600 ring-2 ring-emerald-200 hover:bg-emerald-400 hover:ring-rose-200 transition-colors duration-150">
                    Clock-In
                </a>
            </li>
            <li class="max-h-14 py-4 px-2 font-medium text-slate-700 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer">
                <a href="">Profile</a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <x-form.button class="max-h-14 py-4 hover:border-b-4 border-rose-700 hover:text-rose-500 transition-colors duration-150">
                        Sign Out
                    </x-form.button>
                </form>
            </li>
        </ul>
        @else
        <ul class="flex gap-5">
            <li class="max-h-14 py-4 px-2 font-medium text-slate-700 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer">
                <a href="/register">Register</a>
            </li>
            <li class="max-h-14 py-4 px-2 font-medium text-slate-700 hover:border-b-4 border-emerald-700 hover:text-emerald-500 transition-colors duration-150 cursor-pointer">
                <a href="/login">Login</a>
            </li>
        </ul>
        @endauth
        
    </nav>
</header>