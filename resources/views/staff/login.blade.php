<x-layout title="Login">
    <main>
        <form action="/authenticate" method="POST" autocomplete="off">
            @csrf

            <x-form.input name="email" labelName="email" type="email"  />
            <x-form.input name="password" labelName="password" type="password"  />
            <x-form.button>Log In</x-form.button>
        </form>
    </main>
</x-layout>