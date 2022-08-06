<x-layout.main-layout title="Verify Email" type="auth">

    <x-layout.form-layout class="flex-col items-center gap-8 h-[34rem]">
        <x-title name="Verify Email" />
        <x-subheading>
            A verification link has been sent to your email.
        </x-subheading>
        <x-subheading>
            Please verify your email to proceed.
        </x-subheading>
        <form action="{{ route('verification.resend') }}" method="POST">
            @csrf

            <x-button.form-submit>
                Resend verification link
            </x-button.form-submit>
        </form>
        <x-alert.message />
    </x-layout.form-layout>


</x-layout.main-layout>
