<x-layout.main-layout title="Attendance" type="dashboard" :role="$staff->role" sidebarLinkType="monitor">
    <main class="flex flex-col gap-4">
        <x-title name="Performance" class="mx-4 mt-2"/>
        @unless(Auth::user()->role === 'employee')
            <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
                <form action="{{ route('performance.get') }}" method="GET">
                    @csrf
                    <x-form.select name="employee" label-name="">
                        <option value="" selected disabled>Select employee</option>
                        @foreach($staff_list as $staff_lists)
                            <option value="{{$staff_lists->staff_id}}">{{ $staff_lists->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-button.form-submit>
                        Get Performance
                    </x-button.form-submit>
                </form>
            </section>
            @if(isset($employee))
                <section class="flex flex-col gap-4">
                    <x-title :name="$employee->name" class="mb-8" />
                    <div>Satisfaction level: {{ $work_performance }}%</div>
                </section>
            @endif
        @else

            @unless(isset($work_performance))
                <section class="flex flex-col gap-4">
                    <form action="{{ route('performance.get') }}">
                        @csrf
                        <input name="employee" value="{{ $staff->staff_id }}" hidden>
                        <x-button.submit>
                            Click here to reveal your work performance
                        </x-button.submit>
                    </form>
                </section>
            @else
                <section class="flex flex-col gap-4">
                    <x-title :name="$staff->name" class="mb-8" />
                    <div>
                        {{ $work_performance }}%
                    </div>
                </section>
            @endunless
        @endunless
    </main>
</x-layout.main-layout>
