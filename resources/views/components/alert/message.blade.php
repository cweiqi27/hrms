@props(['message', 'message_type'])

@if($message_type === "success")
    <div
        x-data="{ open: true }"
        x-show="open"
        x-transition
        class='flex justify-between px-6 pb-4 pt-4 bg-emerald-50'
    >
        <div>
            <span class="align-bottom text-2xl text-emerald-500">
                <ion-icon name="checkmark-circle-outline"></ion-icon>
            </span>
            <span class="align-top text-lg font-semibold">
                {{ $message }}
            </span>
        </div>
        <ion-icon
            name="close-outline"
            @click="open = false"
            class="self-center text-2xl hover:text-gray-700 cursor-pointer"
        ></ion-icon>
    </div>

@elseif($message_type === "error")
    <div
        x-data="{ open: true }"
        x-show="open"
        x-transition
        class='flex justify-between px-6 pb-4 pt-4 bg-red-50'
    >
        <div>
            <span class="align-bottom text-2xl text-red-500">
                <ion-icon name="alert-circle-outline"></ion-icon>
            </span>
            <span class="align-top text-lg font-semibold">
                {{ $message }}
            </span>
        </div>
        <ion-icon
            name="close-outline"
            @click="open = false"
            class="self-center text-2xl hover:text-gray-700 cursor-pointer"
        ></ion-icon>
    </div>

@elseif($message_type === "warning")
    <div
        x-data="{ open: true }"
        x-show="open"
        x-transition
        class='flex justify-between px-6 pb-4 pt-4 bg-amber-50'
    >
        <div>
            <span class="align-bottom text-2xl text-amber-500">
                <ion-icon name="warning-outline"></ion-icon>
            </span>
            <span class="align-top text-lg font-semibold">
                {{ $message }}
            </span>
        </div>
        <ion-icon
            name="close-outline"
            @click="open = false"
            class="self-center text-2xl hover:text-gray-700 cursor-pointer"
        ></ion-icon>
    </div>

@elseif($message_type === "info")
    <div
        x-data="{ open: true }"
        x-show="open"
        x-transition
        class='flex justify-between px-6 pb-4 pt-4 bg-indigo-50'
    >
        <div>
            <span class="align-bottom text-2xl text-indigo-500">
                <ion-icon name="information-circle-outline"></ion-icon>
            </span>
            <span class="align-top text-lg font-semibold">
                {{ $message }}
            </span>
        </div>
        <ion-icon
            name="close-outline"
            @click="open = false"
            class="self-center text-2xl hover:text-gray-700 cursor-pointer"
        ></ion-icon>
    </div>

@endif


