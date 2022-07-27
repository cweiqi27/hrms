<x-layout.main-layout title="Verify Email" type="auth">

    <x-layout.form-layout class="flex-col items-center gap-8">
        <x-title name="Verify Email" />
        <p class="text-slate-600">A verification link has been sent to your email.</p>
        <p class="text-slate-600">Please verify your email to proceed.</p>
        <form action="{{ route('verification.resend') }}" method="POST">
            @csrf 
            
            <x-button.submit 
                class="rounded-md text-slate-100 bg-emerald-500 hover:bg-emerald-400 
                    transition-all duration-100"
            >
                Resend verification link
            </x-button.submit>
        </form>
        <x-alert.message />
    </x-layout.form-layout>


</x-layout.main-layout>