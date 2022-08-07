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

    <a href="{{ route('home') }}" class="w-full py-2 text-slate-50 text-center font-semibold">Home</a>
    <a href="" class="w-full py-2 text-slate-50 text-center font-semibold">Task</a>
    <a href="{{ route('leave.show') }}" class="w-full py-2 text-slate-50 text-center font-semibold">Leave</a>
    <a href="{{ route('monitor.show') }}" class="w-full py-2 text-slate-50 text-center font-semibold">Monitor</a>
    <a href="{{ route('staff.profile') }}" class="w-full py-2 text-slate-50 text-center font-semibold">Profile</a>
    <form class="inline" method="POST" action="/logout" class="w-full text-center">
        @csrf
        <x-button.submit class="py-2 text-slate-50 font-semibold">
            Sign out
        </x-button.submit>
    </form>
</div>
