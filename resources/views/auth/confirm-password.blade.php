<x-layout.main-layout title="Confirm password" type="auth">
    <x-layout.form-layout class="flex-col px-2 sm:px-12 items-start gap-8 h-[34rem]">
        <div class="flex gap-4 items-end">
            <x-title name="Hang on" />
            <ion-icon name="alert-circle-outline" class="text-3xl text-yellow-500"></ion-icon>
        </div>
        <x-subheading>We have to make sure it's really you before you can proceed to this page.</x-subheading>
        <form action="{{ route('password.confirm-password') }}" method="POST" autocomplete="off">
            @csrf
            <x-form.input name="password" labelName="Password" type="password"/>
            <x-button.form-submit>Confirm</x-button.form-submit>
        </form>
    </x-layout.form-layout>
</x-layout.main-layout>
