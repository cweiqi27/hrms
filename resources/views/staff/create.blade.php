<x-layout title="Register">
    <main>
        <form action="/staff" method="POST" autocomplete="off">
            @csrf

            <x-form.input name="name" />
            <x-form.input name="email" />
            <x-form.input name="password" />
            <x-form.input name="password_confirmation" />
            <x-form.input name="contact_no" />
            <x-form.input name="status" />
            <x-form.input name="salary" />
            <x-form.input name="department" />
            <x-form.input name="role" />
            <x-form.button>Sign Up</x-form.button>
        </form>
    </main>
</x-layout>