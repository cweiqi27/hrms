<x-layout.main-layout title="Leave" type="dashboard" :role="$staff->role" sidebarLinkType="leave">
    <x-title name="Leave" class="mx-4 mt-2"/>
    {{--Search bar--}}


    <form action="{{ route('leave.store') }}" method="POST">
        @csrf
        <div class="flex flex-col mx-auto px-2 md:w-1/2">
            <x-datepicker />
            <label for="leave_type" class="mt-4">
                Leave type
            </label>
            <select
                name="leave_type"
                id="leave_type"
                class="mt-2 mb-8 px-3 py-2 border-2 rounded-md"
            >
                <option value="" disabled>Select type of leave</option>
                <option value="annual">Annual</option>
                <option value="medical">Medical</option>
                <option value="maternity">Maternity</option>
            </select>
            <button
                type="submit"
                class="rounded-md p-2 w-full text-slate-100
                    bg-emerald-500 hover:bg-emerald-400 transition-all duration-100"
            >
                Apply
            </button>
        </div>
    </form>
    @php
        $available_annual_leaves = preg_replace('/[^0-9]/', '', $available_leaves->pluck('available_annual_leaves'));
        $available_medical_leaves = preg_replace('/[^0-9]/', '', $available_leaves->pluck('available_medical_leaves'));
        $available_maternity_leaves = preg_replace('/[^0-9]/', '', $available_leaves->pluck('available_maternity_leaves'));
    @endphp

    {{-- Available leaves --}}
    <section class="flex flex-col mx-4">
        <h2 class="font-semibold text-xl">
            Leaves Available
        </h2>
        <div>
            Annual: {{ $available_annual_leaves }}
        </div>
        <div>
            Medical: {{ $available_medical_leaves }}
        </div>
        <div>
            Maternity: {{ $available_maternity_leaves }}
        </div>
    </section>

    {{-- Leaves applied --}}
    <section class="flex flex-col mx-4">
        <h2 class="font-semibold text-xl">
            Applied leaves
        </h2>
        @foreach($applied_leaves as $applied_leave)
            <div>
                <span class="">
                    {{ $applied_leave->leave_date }}
                </span>
                <span class="">
                    {{ $applied_leave->leave_status }}
                </span>
            </div>
        @endforeach
    </section>

</x-layout.main-layout  >
