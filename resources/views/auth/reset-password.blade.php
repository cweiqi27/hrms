<x-layout.main-layout title="Reset Password" type="auth">
    <x-layout.form-layout class="flex-col h-[34rem] px-2 sm:px-12 gap-8">
        <x-title name="Reset Password" />
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <x-form.input name="email" labelName="Email" type="email" />
            <x-form.input name="password" labelName="Password" type="password" />
            <x-form.input name="password_confirmation" labelName="Confirm Password" type="password" />
            <x-form.input name="token" labelName="" :value="$token" type="hidden" />
            <x-button.form-submit>
                Reset password
            </x-button.form-submit>
        </form>
    </x-layout.form-layout>
</x-layout.main-layout>