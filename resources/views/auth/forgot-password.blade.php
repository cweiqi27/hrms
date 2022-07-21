<x-layout title="Forgot Password" type="auth">
    <x-button.back />
    <form action="{{ route('password.email') }}" method="POST" autocomplete="off">
        @csrf        
        <x-form.input name="email" labelName="Your email" type="email" /> 
        <x-button.submit>Send password reset link</x-button.submit>
    </form>
</x-layout>