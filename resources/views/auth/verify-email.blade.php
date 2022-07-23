<x-layout title="Verify Email" type="auth">

    <p>A verification link has been sent to your email.</p>
    <form action="{{ route('verification.resend') }}" method="POST">
        @csrf 
        
        <x-button.submit>Resend verification link</x-button.submit>
    </form>


</x-layout>