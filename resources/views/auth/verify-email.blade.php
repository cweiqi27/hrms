<x-layout.main-layout title="Verify Email" type="auth">

    <x-layout.form-layout class="flex-col items-start gap-8 px-2 sm:px-12 h-[34rem]">
        <div class="flex gap-4 items-end">
            <x-title name="Verify Email" />
            <ion-icon name="mail-outline" class="text-3xl text-emerald-500"></ion-icon>
        </div>
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
