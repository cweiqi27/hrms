<x-layout.main-layout title="Register" type="auth">
    <x-layout.form-layout class="h-full">
        <x-layout.form-layout-left>
            <div>
                <x-title name="REGISTER" class="font-bold tracking-wider"/>
                <h2 class="text-slate-700 text-right font-semibold">{{ $role }}</h2>
            </div>
            <img src="{{ asset('img/HRMS-logos_black.png') }}" alt="HRMS logo" class="w-48">
            <h2 class="text-slate-700">
                Already have an account?
                <a
                    class="hover:underline font-semibold"
                    href="{{ route('login') }}"
                >
                    Log In
                </a>
            </h2>
        </x-layout.form-layout-left>
        <x-layout.form-layout-right>
            <div>
                <x-title name="Register" class="md:hidden" />
                <h2 class="md:hidden text-slate-700">
                    Already have an account?
                    <a
                        class="hover:underline font-semibold"
                        href="{{ route('login') }}"
                    >
                        Log In
                    </a>
                </h2>
            </div>
            <form action="{{ route('register.store', [ 'role' => $role ]) }}" method="POST" autocomplete="off">
                @csrf

                <x-form.input labelName="Name" name="name" />
                <x-form.input labelName="Email" name="email" type="email" />
                <x-form.input labelName="Password" name="password" type="password" />
                <x-form.input labelName="Confirm Password" name="password_confirmation" type="password" />
                <x-form.input labelName="Contact Number" name="contact_no" type="number" min="0" />
                <x-form.input labelName="" name="status" value="Active" type="hidden" />

                <div x-data="{ departmentType: '' }">

                    {{--Department--}}
                    @if($role === 'admin')
                        <x-form.input labelName="Department" name="department" value="HR" readonly/>
                    @else
                        <label
                            for="department"
                            class="text-gray-600 text-sm font-semibold"
                        >
                            Department
                        </label>

                        <select
                            x-model="departmentType"
                            name="department"
                            id="department"
                            class="mt-2 mb-8 w-full px-3 py-2 border-2 rounded-md"
                        >
                            <option value="" disabled>Select department</option>
                            <option value="HR">Human Resource</option>
                            <option value="IT">Information Technology</option>
                            <option value="Accounting/Finance">Accounting and Finance</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    @endif

                    {{--Positions--}}
                    @php
                        $itPositions = array_keys(config('shared_vars.itPositions'));
                        $financePositions = array_keys(config('shared_vars.financePositions'));
                        $hrPositions = array_keys(config('shared_vars.hrPositions'));
                        $marketingPositions = array_keys(config('shared_vars.marketingPositions'));
                    @endphp
                    <label
                        for="position"
                        class="text-gray-600 text-sm font-semibold"
                    >
                        Position
                    </label>
                    @if($role === 'admin')
                        <select
                            x-bind="departmentType"
                            name="position"
                            id="position"
                            class="mt-2 mb-8 w-full px-3 py-2 border-2 rounded-md"
                        >
                            <option value="" disabled>Select position</option>
                            @foreach($hrPositions as $hrPosition)
                                <option value="{{ $hrPosition }}">{{ $hrPosition }}</option>
                            @endforeach
                        </select>
                    @else
                        <select
                            x-bind="departmentType"
                            name="position"
                            id="position"
                            class="mt-2 mb-8 w-full px-3 py-2 border-2 rounded-md"
                        >
                            <option value="" disabled>Select position</option>
                            @foreach($itPositions as $itPosition)
                                <template x-if="departmentType === 'IT'">
                                        <option value="{{ $itPosition }}">{{ $itPosition }}</option>
                                </template>
                            @endforeach
                            @foreach($financePositions as $financePosition)
                                <template x-if="departmentType === 'Accounting/Finance'">
                                    <option value="{{ $financePosition }}">{{ $financePosition }}</option>
                                </template>
                            @endforeach
                            @foreach($hrPositions as $hrPosition)
                                <template x-if="departmentType === 'HR'">
                                    <option value="{{ $hrPosition }}">{{ $hrPosition }}</option>
                                </template>
                            @endforeach
                            @foreach($marketingPositions as $marketingPosition)
                                <template x-if="departmentType === 'Marketing'">
                                    <option value="{{ $marketingPosition }}">{{ $marketingPosition }}</option>
                                </template>
                            @endforeach
                        </select>
                    @endif
                </div>

                <x-form.select labelName="Level" name="level">
                    <option value="Junior">Junior</option>
                    <option value="Mid">Mid</option>
                    <option value="Senior">Senior</option>
                </x-form.select>

                <x-button.form-submit>
                    Sign Up
                </x-button.form-submit>
            </form>

        </x-layout.form-layout-right>
    </x-layout.form-layout>
</x-layout.main-layout>
