@props(['staff'])
<section class="flex p-8 gap-4">
    <div class="flex flex-col text-right">
        <h1>Name :</h1>
        <h1>Email :</h1>
        <h1>Contact No :</h1>
        <h1>Department :</h1>
        <h1>Salary :</h1>
    </div>
    <div class="flex flex-col">
        <h1>
            {{ $staff->name }}
        </h1>
        <p>
            {{ $staff->email }}
        </p>
        <p>
            {{ $staff->contact_no }}
        </p>
        <p>
            {{ $staff->department }}
        </p>
        <p>
            RM {{ $staff->salary }}
        </p>
    </div>
</section>
