<div 
    class="z-50 fixed top-0 left-0 w-screen h-full backdrop-blur-2xl backdrop-brightness-75"
    x-show="isModalOpen"
    x-cloak
    x-transition.opacity
    x-transition:leave.duration.150ms

>
    <div 
        class="flex justify-center items-center w-full h-full"
        x-show="isModalOpen"
        x-cloak
        x-transition
        x-transition:leave.duration.150ms
        x-trap.noscroll="isModalOpen"
        @keydown.right="$focus.next()"
        @keydown.down="$focus.next()"
        @keydown.left="$focus.previous()"
        @keydown.up="$focus.previous()"
    >
        <div {{ $attributes -> merge([
            'class' => 'flex flex-col gap-4 min-w-min rounded-md bg-white pt-4 pb-6 px-8 shadow-md'
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