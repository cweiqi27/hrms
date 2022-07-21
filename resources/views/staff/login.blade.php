<x-layout title="Login" type="auth">
    <main>
        <form action="/authenticate" method="POST" autocomplete="off">
            @csrf

            <x-form.input name="email" labelName="email" type="email"  />
            <x-form.input name="password" labelName="password" type="password"  />
            <x-button.submit>Log In</x-button.submit>
        </form>
        <a href="/forgot-password">Forgot Password?</a>
    </main>
</x-layout>