<div
    x-data="{'isModalOpen' : false}"
    x-on:keydown.escape="isModalOpen=false"
    {{ $attributes -> merge(['class' => '']) }}>
    <span class="text-slate-700">
        New here?
        <button
            class="hover:underline font-semibold"
            x-on:click="isModalOpen = true"
        >
            Register now
        </button>
    </span>
    <x-modal.modal>
        <x-title name="REGISTER" class="text-slate-700 font-semibold tracking-wider self-center sm:translate-y-[-2rem]
                                    underline decoration-double decoration-rose-400"/>
        <div class="flex flex-col sm:flex-row sm:justify-center gap-6 sm:gap-8">
            <a href="{{ route('register.admin') }}"
                class="p-4 rounded-lg border-2 border-emerald-600 text-slate-700 text-center font-semibold
                hover:bg-emerald-600 hover:text-slate-50 hover:outline
                hover:outline-rose-300 outline-offset-0 transition-all">
                Admin
            </a>
            <a href="{{ route('register.employee') }}"
                class="p-4 rounded-lg border-2 border-emerald-600 text-slate-700 text-center font-semibold
                hover:bg-emerald-600 hover:text-slate-50 hover:outline
                hover:outline-rose-300 outline-offset-0 transition-all">
                Employee
            </a>
        </div>
    </x-modal.modal>
</div>
