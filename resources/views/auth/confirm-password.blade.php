<x-layout.main-layout title="Confirm password" type="auth">
    <x-layout.form-layout class="flex-col px-2 sm:px-12 items-start gap-12 h-[34rem]">
        <div class="flex gap-4 items-end">
            <x-title name="Hang on" />
            <ion-icon name="alert-circle-outline" class="text-3xl text-yellow-500 pointer-events-none"></ion-icon>
        </div>
        <div class="flex flex-col gap-4">
            <x-subheading>You're entering sensitive territory.</x-subheading>
            <x-subheading>We just have to really make sure it's actually you.</x-subheading>
        </div>
        <form action="{{ route('password.confirm-password') }}" method="POST" autocomplete="off">
            @csrf
            <x-form.input name="password" labelName="Your password" type="password"/>
            <x-button.form-submit>Confirm</x-button.form-submit>
        </form>
    </x-layout.form-layout>
</x-layout.main-layout>
