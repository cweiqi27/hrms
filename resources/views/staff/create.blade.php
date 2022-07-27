<x-layout.main-layout title="Register" type="auth">
    <x-layout.form-layout class="flex-col items-center h-[54rem]">
        <x-title name="Register" class="flex-1" />
        <div class="flex flex-col flex-1 gap-8 justify-evenly rounded-xl 
            max-w-sm md:max-w-none py-4 px-2 md:px-12 md:py-10 bg-white">
            <form action="{{ route('register.store', [ 'role' => $role ]) }}" method="POST" autocomplete="off">
                @csrf
        
                <x-form.input labelName="Name" name="name" />
                <x-form.input labelName="Email" name="email" type="email" />
                <x-form.input labelName="Password" name="password" type="password" />
                <x-form.input labelName="Confirm Password" name="password_confirmation" type="password" />
                <x-form.input labelName="Contact Number" name="contact_no" type="number" min="0" />
                <x-form.input labelName="Status" name="status" value="Active" readonly/>
                <x-form.input labelName="Salary" name="salary" type="number" min="0" />
                
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
        
                <x-button.submit 
                    class="rounded-md w-full text-slate-100 bg-emerald-500 hover:bg-emerald-400  
                        transition-all duration-100">
                    Sign Up
                </x-button.submit>
            </form>
        </div>
    </x-layout.form-layout>
</x-layout.main-layout>