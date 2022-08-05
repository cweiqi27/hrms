@props(['sidebarLinkType'])

@if(isset($sidebarLinkType))
<aside class="hidden lg:block fixed inset-0 top-[3.53rem] right-auto w-44 px-4 bg-zinc-100">
    <ul class="flex flex-col shrink-0 gap-2 my-4">
        @foreach (Helper::links($sidebarLinkType) as $link => $name)    
            <li class="px-4 py-2 font-medium text-slate-700 hover:cursor-pointer hover:text-emerald-500 hover:translate-x-1 ease-in-out duration-150">
                <a href="{{ route($link) }}">{{ $name }}</a>
            </li>
        @endforeach
    </ul>
</aside>
@endif