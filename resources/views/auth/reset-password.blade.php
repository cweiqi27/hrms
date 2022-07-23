<x-layout title="Reset Password" type="auth">
    <a href="{{ route('login') }}"></a>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <x-form.input name="email" labelName="Email" type="email" />
        <x-form.input name="password" labelName="Password" type="password" />
        <x-form.input name="password_confirmation" labelName="Confirm Password" type="password" />
        <x-form.input name="token" labelName="" :value="$token" type="hidden" />
        <x-button.submit>Reset</x-button.submit>
    </form>
</x-layout>