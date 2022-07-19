<x-layout title="Verify Email">

    <p>A verification link has been sent to your email.</p>
    <form action="{{ route('verification.resend') }}" method="POST">
        @csrf 
        
        <x-form.button>Resend verification link</x-form.button>
    </form>


</x-layout>