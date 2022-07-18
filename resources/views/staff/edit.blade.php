{{-- Edit Profile --}}
<section>
    <form action="/edit" method="POST">
        @csrf

        <x-form.input :name="$staff_name" />
        <x-form.input :name="$staff_email" />
        <x-form.input :name="$staff_name" />
        <x-form.input :name="$staff_name" />
        <x-form.input :name="$staff_name" />
    </form>
</section>