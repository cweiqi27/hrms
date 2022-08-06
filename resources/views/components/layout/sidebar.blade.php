@props(['sidebarLinkType'])

@if(isset($sidebarLinkType))
<aside class="z-50 hidden lg:block fixed inset-0 top-[3.53rem] right-auto w-44 px-4 bg-slate-50">
    <nav class="flex flex-col shrink-0 gap-2 my-4">
        @foreach (Helper::links($sidebarLinkType) as $link => $name)
            <a
                href="{{ route($link) }}"
                class="px-4 py-2 font-medium text-slate-700 hover:cursor-pointer hover:text-emerald-500
                    hover:translate-x-1 ease-in-out duration-150"
            >
                {{ $name }}
            </a>
        @endforeach
    </nav>
</aside>
@endif
