<x-layout.main-layout title="Register" type="auth">
    <x-layout.form-layout class="h-full">
        <x-layout.form-layout-left>
            <div>
                <x-title name="REGISTER" class="font-bold tracking-wider"/>
                <h2 class="text-slate-700 text-right font-semibold">{{ $role }}</h2>
            </div>
            <img src="img/HRMS-logos_black.png" alt="HRMS logo" class="w-48">
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
                <x-form.input labelName="Salary" name="salary" type="number" min="0" />
                <x-form.input labelName="" name="status" value="Active" type="hidden" />

                @if($role === 'admin')
                    <x-form.input labelName="Department" name="department" value="HR" readonly/>
                @else
                    <x-form.select labelName="Department" name="department">
                        <option value="HR">Human Resource</option>
                        <option value="IT">Information Technology</option>
                        <option value="Accounting/Finance">Accounting and Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="R&D">Research and Development</option>
                    </x-form.select>
                @endif

                <x-form.input labelName="Position" name="position" />

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
