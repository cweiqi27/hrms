<x-layout.main-layout title="Attendance" type="dashboard" :role="$staff->role" sidebarLinkType="monitor">
    <section class="flex flex-col gap-4 mt-10 px-2 sm:px-6">
        {{--Search bar--}}
        <form action="{{ route('attendance.get') }}" method="GET">
            @csrf
                <x-form.select name="employee" label-name="Employee">
                    <option value="" selected disabled>Select employee</option>
                    @foreach($staff_list as $staff_lists)
                        <option value="{{$staff_lists->staff_id}}">{{ $staff_lists->name }}</option>
                    @endforeach
                </x-form.select>
                <x-form.select name="period" label-name="Period">
                    <option value="" selected disabled>Select period</option>
                    <option value="monthly">This month</option>
                    <option value="yearly">This year</option>
                </x-form.select>
                <x-button.submit
                    class="rounded-r-lg px-4
                            bg-emerald-500 hover:bg-emerald-400
                            text-slate-50"
                >
                    <ion-icon name="search-outline" />
                </x-button.submit>
        </form>
    </section>
    @if(isset($period))
        <section class="flex flex-col gap-4">
            @foreach($period as $key => $date)
                @php
                    $isPresentKey = $date . "isPresent";
                    $isLeaveKey = $date . "isLeave";
                @endphp
                @unless($key === true || $date === true)
                    <div class="flex justify-center bg-emerald-300 p-4">
                        <div>{{ $date }}</div>
                    </div>
                    @unless(array_key_exists($isPresentKey, $period))
                        <div class="flex justify-center bg-red-300 p-4">
                            <div>{{ $date }}</div>
                        </div>
                    @endunless
                @endunless
            @endforeach
        </section>
    @endif
</x-layout.main-layout>