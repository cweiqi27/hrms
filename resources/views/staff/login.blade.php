<x-layout title="Login">
    <main>
        <form action="/authenticate" method="POST" autocomplete="off">
            @csrf

            <x-form.input name="email" />
            <x-form.input name="password" />
            <x-form.button>Log In</x-form.button>
        </form>
    </main>
</x-layout>