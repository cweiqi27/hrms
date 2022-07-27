<div 
    class="absolute top-0 left-0 w-screen h-screen backdrop-blur-3xl backdrop-brightness-90"
    x-show="isModalOpen"
    x-cloak
    x-transition
>
    <div 
        class="flex justify-center items-center w-full h-full"
        x-show="isModalOpen"
        x-on:click.away="isModalOpen = false"
        x-cloak
        x-transition
    >
        <div {{ $attributes -> merge([
            'class' => 'flex flex-col gap-4 rounded-md bg-white p-8 shadow-md'
            ]) 
        }}>
        <button x-on:click="isModalOpen = false" class="relative flex-none self-end">
            <ion-icon 
                name="close-outline"
                class="text-xl text-slate-900 hover:text-rose-600"
            />
        </button>
            {{ $slot }}
        </div>
    </div>
</div>