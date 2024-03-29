@props(['route', 'title', 'description', 'icon'])

<a
    href= "{{ route($route) }}"
    class="flex flex-col flex-1 justify-between rounded-lg lg:w-0 max-w-sm md:h-[16rem]
                shadow-[0_0_6px_-1px_rgb(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)]
                shadow-gray-400 bg-slate-50 hover:shadow-lg hover:shadow-gray-400
                hover:translate-y-[-0.5rem] hover:bg-emerald-700 text-slate-600 hover:text-slate-50
                transition-all duration-200">
    <div class="px-10 pt-6">
        <h2 class="text-xl font-bold">
            {{ $title }}
        </h2>
        <p class="font-normal">
            {{ $description }}
        </p>
    </div>

    <div class="text-right w-full px-4">
        <ion-icon
            name="{{ $icon }}"
            class="text-[6rem] pointer-events-none"
        >
        </ion-icon>
    </div>
</a>
