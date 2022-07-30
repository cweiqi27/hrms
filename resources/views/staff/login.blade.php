<x-layout.main-layout title="Login" type="auth">
    <x-layout.form-layout class="h-[34rem]">
        <x-layout.form-layout-left>
            <x-title name="LOG IN" class="font-bold tracking-wider"/>
            <img src="img/HRMS-logos_black.png" alt="HRMS logo" class="w-48">
            <x-modal.create-modal />
            
        </x-layout.form-layout-left>
        <x-layout.form-layout-right>
            <div>
                <x-title name="LOG IN" class="md:hidden font-bold tracking-wider"/>
                <x-modal.create-modal class="md:hidden"/>
            </div>
            <form action="/authenticate" method="POST" autocomplete="on" 
                    class="flex flex-col justify-evenly">
                @csrf
                
                <x-form.input name="email" labelName="Email Address" type="email"  />
                <x-form.input name="password" labelName="Password" type="password"  />
                <label class="text-slate-600 mb-4 mt-2">
                    <input type="checkbox" name="remember_me" id="remember_me">
                    Remember me
                </label>
                <x-button.form-submit>
                    Log In
                </x-button.form-submit>
            </form>
            <a href="/forgot-password" class="text-slate-500 hover:text-slate-800 hover:underline">
                Forgot password?
            </a>
        </x-layout.form-layout-right>
    </x-layout.form-layout>
</x-layout.main-layout>