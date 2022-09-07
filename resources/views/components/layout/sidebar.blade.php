@props(['sidebarLinkType'])

@if(isset($sidebarLinkType))
<aside class="z-40 hidden lg:block absolute inset-0 top-[3.53rem] right-auto w-44 px-4 bg-slate-50">
    <nav class="flex flex-col shrink-0 gap-2 my-4">
        <h1 class="uppercase text-slate-700 font-bold cursor-default">{{ $sidebarLinkType }}</h1>
        @foreach (Helper::links($sidebarLinkType) as $link => $name)
            <a
                href="{{ route($link) }}"
                class="{{ str_contains(Route::currentRouteName(), $link)
                ? 'group px-4 py-2 border-l-2
                        border-l-emerald-800 hover:cursor-pointer duration-150'
                : 'group px-4 py-2 border-l-2
                        hover:border-l-emerald-800 hover:cursor-pointer duration-150'
                        }}"
            >
                <h2 class="{{ str_contains(Route::currentRouteName(), $link)
                                ? 'font-semibold text-slate-600
                                    translate-x-1 ease-in-out transition-all duration-150'
                                : 'font-medium text-slate-500 group-hover:text-emerald-600
                                    group-hover:translate-x-1 transition-all ease-in-out duration-150'
                                    }}"
                >
                    {{ $name }}
                </h2>
            </a>
        @endforeach
    </nav>
</aside>
@endif
