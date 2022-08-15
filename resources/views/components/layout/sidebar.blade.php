@props(['sidebarLinkType'])

@if(isset($sidebarLinkType))
<aside class="z-40 hidden lg:block fixed inset-0 top-[3.53rem] right-auto w-44 px-4 bg-slate-50">
    <nav class="flex flex-col shrink-0 gap-2 my-4">
        <h1 class="uppercase text-slate-700 font-bold cursor-default">{{ $sidebarLinkType }}</h1>
        @foreach (Helper::links($sidebarLinkType) as $link => $name)
            <a
                href="{{ route($link) }}"
                class="group px-4 py-2 border-l-2
                        hover:border-l-emerald-800 hover:cursor-pointer duration-150 "
            >
                <p class="font-medium text-slate-500 group-hover:text-emerald-600
                    group-hover:translate-x-1 ease-in-out duration-150">
                    {{ $name }}
                </p>
            </a>
        @endforeach
    </nav>
</aside>
@endif
