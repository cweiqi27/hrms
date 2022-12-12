<x-layout.main-layout title="Payroll" type="dashboard" :role="$staff->role" sidebarLinkType="monitor">
    <main class="flex flex-col gap-4">
        <x-title name="Payroll" class="mx-4 mt-2"/>
        <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
            <form action="{{ route('payroll.get') }}" method="GET">
                @csrf
                    <x-form.select name="employee" label-name="">
                        <option value="" selected disabled>Select employee</option>
                        @foreach($staff_list as $staff_lists)
                            <option value="{{$staff_lists->staff_id}}">{{ $staff_lists->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-button.form-submit>
                        Get Pay
                    </x-button.form-submit>
            </form>
        </section>
        @if(isset($employee) || Auth::user()->role === 'employee')
            <section class="flex flex-col gap-4">
                <x-title :name="$employee->name" class="mb-8" />
                <div>Monthly salary: RM {{ $employee->salary }}</div>
                <div>Expected year-end bonus: RM {{ $bonus }}</div>
                <form action="{{ route('payroll.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="employee" value="{{ $employee->staff_id }}">
                  
                        <x-button.form-submit class="max-w-sm">  Update Salary </x-button.form-submit>
                   
                </form>
            </section>
        @endif
    </main>
</x-layout.main-layout>

