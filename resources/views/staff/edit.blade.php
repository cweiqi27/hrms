{{-- Edit Profile --}}
<section>
    <form action="/edit" method="POST">
        @csrf

        <x-form.input :labelName="$staff_name" />
        <x-form.input :labelName="$staff_email" />
        <x-form.input :labelName="$staff_name" />
        <x-form.input :name="$staff_name" />
        <x-form.input :name="$staff_name" />
        <x-button.submit>Edit</x-button.submit>
    </form>
</section>