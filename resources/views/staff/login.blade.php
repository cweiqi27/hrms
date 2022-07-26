<x-layout title="Login" type="auth">
    <section class="py-4">
        <x-title name="Log In" class="md:hidden"/>
        <p></p>
    </section>
    <section class="flex justify-center max-w-screen-lg h-[34rem] mx-auto md:shadow-xl md:shadow-slate-300">
        <div class="hidden md:flex flex-col flex-1 justify-center items-center 
                    rounded-l-xl w-0 bg-gradient-to-tr from-emerald-200 to-indigo-200">
            <x-title name="SIGN IN" class="font-bold tracking-wider text-slate-800"/>
            <img src="img/HRMS-logos_black.png" alt="HRMS logo" class="w-48">
            <div>
                <p class="text-slate-800">
                    New here?
                    <a 
                        href="{{ route('register') }}"
                        class="hover:underline font-semibold">
                        Sign Up now
                    </a>
                </p>
            </div>
        </div>
        <div class="flex flex-col flex-1 rounded-r-xl max-w-sm md:max-w-none py-4 px-2 md:px-12">
            <form action="/authenticate" method="POST" autocomplete="off">
                @csrf
                
                <x-form.input name="email" labelName="Email Address" type="email"  />
                <x-form.input name="password" labelName="Password" type="password"  />
                {{-- <x-form.input name="remember" labelName=" " type="checkbox" value="Remember me" /> --}}
                <x-button.submit>Log In</x-button.submit>
            </form>
            <a href="/forgot-password" class="text-slate-600">Forgot password?</a>
            {{-- <a href="{{ route('register') }}" class="text-slate-600">Sign Up</a> --}}
        </div>
    </section>
</x-layout>