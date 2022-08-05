<x-layout.main-layout title="Edit Profile" type="dashboard" :role="$staff->role" sidebarLinkType="profile">
<section
    x-data="{
        isEditableName : false,
        isEditableEmail : false,
        isEditableContact : false
    }"
>
    <x-title :name="$staff->name" />
    <form action="/edit" method="POST">
        @csrf
        <div class="flex gap-4">
            <h2>Name: {{ $staff->name }}</h2>
            <button type="button" x-on:click="isEditableName = ! isEditableName">edit</button>
        </div>
        <x-form.input
        labelName=""
        name="name"
        :placeholder="$staff->name"
        x-show="isEditableName"
        />

        <div class="flex gap-4">
            <h2>Email: {{ $staff->email }}</h2>
            <button type="button" x-on:click="isEditableEmail = ! isEditableEmail">edit</button>
        </div>
        <x-form.input
        labelName=""
        name="email"
        :placeholder="$staff->email"
        x-show="isEditableEmail"
        />

        <div class="flex gap-4">
            <h2>Email: {{ $staff->contact_no }}</h2>
            <button type="button" x-on:click="isEditableContact = ! isEditableContact">edit</button>
        </div>
        <x-form.input
        labelName=""
        name="email"
        :placeholder="$staff->contact_no"
        x-show="isEditableContact"
        />

        <x-button.submit>Edit</x-button.submit>
    </form>
</section>
</x-layout.main-layout>
