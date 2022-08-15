<x-layout.main-layout type="dashboard" title="Edit" sidebarLinkType="monitor" :role="$staff_role">
    <main class="flex flex-col gap-8">
        <section class="mt-4 ml-2">
            <x-title name="Edit Profile" />
        </section>
        <form
            action="{{ route('monitor.update-staff', $staff) }}"
            method="POST"
            autocomplete="off"
            class="mx-auto"
        >
            @csrf

            <div
                class="flex flex-col gap-4 mt-4"
            >
                <x-edit-field :val="$staff->name" label_name="Name" name="name" type="text" />
                <x-edit-field :val="$staff->contact_no" label_name="Contact No." name="contact_no" type="number" />
                <x-edit-field :val="$staff->department" label_name="Department" name="department" type="text" />
                <x-button.form-submit>Edit</x-button.form-submit>
            </div>

        </form>
    </main>
</x-layout.main-layout>
