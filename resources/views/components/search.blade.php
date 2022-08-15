@props(['route', 'name', 'labelName', 'placeholderName', 'submit'])
<form action="{{ route("$route") }}" method="GET" autocomplete="off">
    @csrf

    <div class="flex justify-center">
        <div class="flex flex-col">
            <label
                for="{{ $name }}"
                class="text-gray-600 text-lg font-semibold"
            >
                {{ $labelName }}
            </label>
            <div class="flex w-[60rem]">
                <input
                    id="{{ $name }}"
                    name="{{ $name }}"
                    class="mb-0 w-full px-3 py-2 border-2 rounded-md
                                outline-none outline-offset-0 focus:outline-none
                                invalid:border-red-500 out-of-range:border-red-500
                                required:border-yellow-500 caret-indigo-300"
                    placeholder = "{{ $placeholderName }}"
                >
                <x-button.submit
                    class="rounded-r-lg px-4
                        bg-emerald-500 hover:bg-emerald-400
                        text-slate-50"
                >
                    {{ $slot }}
                </x-button.submit>
            </div>
        </div>
    </div>

</form>


