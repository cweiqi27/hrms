<x-layout.main-layout title="Task" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <main class="flex flex-col gap-4">
        <x-title name="Review" />
        <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
            <form action="{{ route('task.list-get', ['staff' => 'staff_name']) }}" method="GET">
                <x-form.select name="employee" label-name="Employee" class="flex w-[60rem]">
                    @foreach($staff_list as $staff_lists)
                        <option value="{{$staff_lists->staff_id}}">{{ $staff_lists->name }}</option>
                    @endforeach
                </x-form.select>
                <x-button.form-submit>
                    Get Task
                </x-button.form-submit>
            </form>
            <form action="{{ route('task.list-all') }}" method="GET">
                @csrf
                <x-button.form-submit>All</x-button.form-submit>
            </form>
        </section>


        <section>
            @unless(!isset($task))
                @php
                    $message_type === 'info'
                        ? $message = $task_count . ' active task(s).'
                        : $message = 'No active task.';
                @endphp

                @foreach($employee as $employee_task)
                    <x-title :name="$employee_task->name" />
                @endforeach

                <x-alert.message :message="$message" :message_type="$message_type" />

                <div class="grid grid-cols-3 grid-flow-rows gap-2">
                    @foreach ($task as $tasks)
                        <x-layout.card class="flex-col rounded bg-emerald-100">
                            <h1>
                                {{ $tasks->task_name }}
                            </h1>
                            <h2>
                                {{ $tasks->task_status }}
                            </h2>
                        </x-layout.card>
                    @endforeach
                </div>


            @endunless
        </section>
    </main>
</x-layout.main-layout>
