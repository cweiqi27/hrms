<x-layout.main-layout title="Task - Create" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
        <x-title name="Create Task" />
        <div class="mt-8">
            <form action="{{ route('task.store')  }}" method="POST" autocomplete="off">
                @csrf
                @if(count($managed_staff) === 0)
                    <h2 class="text-slate-600 text-xl">No employee assigned to you at the moment.</h2>
                @else
                    <x-form.select labelName="Employee" name="staff_id">
                        @foreach($managed_staff as $managed_staffs)
                            <option value="{{ $managed_staffs->staff_id }}">{{ $managed_staffs->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.input labelName="Task name" name="task_name" />
                    <x-button.form-submit>Create</x-button.form-submit>
                @endif
            </form>
        </div>
    </section>

</x-layout.main-layout>
