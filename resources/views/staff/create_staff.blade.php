<x-layout title="Register">
    <main>
        <form action="{{ route('staff', [ 'role' => $role ]) }}" method="POST" autocomplete="off">
            @csrf

            <x-form.input labelName="Name" name="name" />
            <x-form.input labelName="Email" name="email" type="email" />
            <x-form.input labelName="Password" name="password" type="password" />
            <x-form.input labelName="Confirm Password" name="password_confirmation" type="password" />
            <x-form.input labelName="Contact Number" name="contact_no" type="number" />
            <x-form.input labelName="Status" name="status" value="Active" readonly/>
            <x-form.input labelName="Salary" name="salary" type="number" />
            
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

            <x-form.button>Sign Up</x-form.button>
        </form>
    </main>
</x-layout>