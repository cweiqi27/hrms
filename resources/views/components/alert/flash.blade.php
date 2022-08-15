@if(session()->has('success'))
    <div
        x-data="{ open: true }"
        x-init="setTimeout(() => open = false, 12000)"
        @click="open = false"
        x-show="open"
        x-transition
        class='fixed bottom-0 right-0 -translate-x-4 -translate-y-6
                rounded-full py-2 px-4
                bg-white shadow-sm shadow-gray-300
                hover:-translate-y-8 hover:-translate-x-6 hover:shadow-md
                transition-all cursor-pointer'
    >
        <span class="align-bottom text-2xl text-emerald-500">
            <ion-icon name="checkmark-circle-outline"></ion-icon>
        </span>
        <span class="align-top text-lg font-semibold">
            {{ session()->get('success') }}
        </span>
    </div>

@elseif(session()->has('error'))
    <div
        x-data="{ open: true }"
        x-init="setTimeout(() => open = false, 12000)"
        @click="open = false"
        x-show="open"
        x-transition
        class='fixed bottom-0 right-0 -translate-x-4 -translate-y-6
                rounded-full py-2 px-4
                bg-white shadow-sm shadow-gray-300
                hover:-translate-y-8 hover:-translate-x-6 hover:shadow-md
                transition-all cursor-pointer'
    >
        <span class="align-bottom text-2xl text-red-500">
            <ion-icon name="alert-circle-outline"></ion-icon>
        </span>
        <span class="align-top text-lg font-semibold">
            {{ session()->get('error') }}
        </span>
    </div>

@elseif(session()->has('warning'))
    <div
        x-data="{ open: true }"
        x-init="setTimeout(() => open = false, 12000)"
        @click="open = false"
        x-show="open"
        x-transition
        class='fixed bottom-0 right-0 -translate-x-4 -translate-y-6
                rounded-full py-2 px-4
                bg-white shadow-sm shadow-gray-300
                hover:-translate-y-8 hover:-translate-x-6 hover:shadow-md
                transition-all cursor-pointer'
    >
        <span class="align-bottom text-2xl text-amber-500">
            <ion-icon name="warning-outline"></ion-icon>
        </span>
        <span class="align-top text-lg font-semibold">
            {{ session()->get('warning') }}
        </span>
    </div>

@elseif(session()->has('info'))
    <div
        x-data="{ open: true }"
        x-init="setTimeout(() => open = false, 12000)"
        @click="open = false"
        x-show="open"
        x-transition
        class='fixed bottom-0 right-0 -translate-x-4 -translate-y-6
                rounded-full py-2 px-4
                bg-white shadow-sm shadow-gray-300
                hover:-translate-y-8 hover:-translate-x-6 hover:shadow-md
                transition-all cursor-pointer'
    >
        <span class="align-bottom text-2xl text-indigo-500">
            <ion-icon name="information-circle-outline"></ion-icon>
        </span>
        <span class="align-top text-lg font-semibold">
            {{ session()->get('info') }}
        </span>
    </div>

@endif
