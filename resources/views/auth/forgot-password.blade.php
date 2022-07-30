@stack('scripts')
<x-layout.main-layout title="Forgot Password" type="auth">
    <x-layout.form-layout class="h-[34rem]">
        <x-layout.form-layout-left>
            <x-title name="Forgot Password" class="font-bold tracking-wider"/>
            <img src="img/HRMS-logos_black.png" alt="HRMS logo" class="w-48">
            <p class="font-serif text-slate-500 px-16 lg:px-24">
                "Memory is the diary that we all carry about with us." <br>- Oscar Wilde
            </p>
        </x-layout.form-layout-left>
        <x-layout.form-layout-right>
            <x-title name="Forgot Password" class="md:hidden font-bold tracking-wider"/>
            <form action="{{ route('password.email') }}" method="POST" autocomplete="off"
                    class="flex flex-col">
                @csrf        
                <x-form.input name="email" labelName="Email Address" type="email" /> 
                <x-button.form-submit>
                    Send password reset link
                </x-button.form-submit>
            </form>
            <a href="{{ route('login') }}" 
                class="w-full py-1 my-8 text-slate-500 hover:text-slate-800 hover:underline">
                Back to Log In
            </a>
        </x-layout.form-layout-right>
    </x-layout.form-layout>
</x-layout.main-layout>