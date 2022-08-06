<x-layout.main-layout title="Confirm password" type="auth">
    <x-title name="Please enter your password to proceed" />
    <form action="{{ route('password.confirm-password') }}" method="POST" autocomplete="off">
        @csrf
        <x-form.input name="password" labelName="Confirm password" type="password"/>
        <x-button.submit>Confirm</x-button.submit>
    </form>
</x-layout.main-layout>
