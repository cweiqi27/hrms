<x-layout.main-layout title="Task" type="dashboard" :role="$staff->role" sidebarLinkType="task">
    <main class="flex flex-col gap-4">
        <x-title name="Review Task" class="mx-4 mt-2"/>

        {{--Search--}}
        <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
            <form action="{{ route('task.list-get', ['staff' => 'staff_name']) }}" method="GET">
                @csrf
                @if(count($managed_staff) === 0)
                    <h2 class="text-slate-600 text-xl">No employee assigned to you at the moment.</h2>
                @else
                    <x-form.select name="employee" label-name="Employee" class="flex w-[60rem]">
                        @foreach($managed_staff as $managed_staffs)
                            <option value="{{$managed_staffs->staff_id}}">{{ $managed_staffs->name }}</option>
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
                @endif
        </section>

        <section class="mx-4">
            @unless(!isset($task))
                @if(isset($employee))
                    @foreach($employee as $employee_task)
                        <x-title :name="$employee_task->name" class="mb-8" />
                    @endforeach
                @endif

                {{--Message--}}
                @php
                    $message_type === 'info'
                        ? $message = $task_count . ' active task(s).'
                        : $message = 'No active task.';
                @endphp

                {{--Legend--}}
                <x-legend-color legend="Assigned" class="bg-sky-400" />
                <x-legend-color legend="Accepted" class="bg-lime-400" />
                <x-legend-color legend="Review" class="bg-violet-400" />

                <x-alert.message :message="$message" :message_type="$message_type" />

                {{--Task Cards--}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 grid-flow-rows gap-2 my-8">
                    @foreach ($task as $tasks)
                        @php
                            $date = \Carbon\Carbon::parse($tasks->task_assign_date)
                                                    ->format('jS F, Y');
                            $time = \Carbon\Carbon::parse($tasks->task_assign_date)
                                                    ->format('h:i A');
                            $task_employee = \App\Models\Staff::select('name')
                                                ->where('staff_id', '=', $tasks->staff_id)
                                                ->get();
                            if($tasks->task_status === 'assigned') {
                                $color = 'border-sky-400';
                            } elseif($tasks->task_status === 'accepted') {
                                $color = 'border-lime-400';
                            } else {
                                $color = 'border-violet-400';
                            }
                        @endphp
                        <x-card.listing-card class="border-t-8 {{ $color }} bg-slate-500">
                            @if(isset($is_list_all))
                                <h1 class="text-slate-200 text-2xl font-semibold">
                                    {{ $task_employee }}
                                </h1>
                            @endif

                            <span>
                                <h1 class="text-slate-200 text-2xl font-semibold">
                                    {{ $tasks->task_name }}
                                </h1>
                            </span>
                            <span>
                                <h2 class="text-slate-300 text-md font-medium">
                                    {{ $date }}
                                </h2>
                                <h2 class="text-slate-300 text-md font-medium">
                                    {{ $time }}
                                </h2>
                            </span>
                            <form action="" method="GET">

                            </form>
                        </x-card.listing-card>
                    @endforeach
                </div>
            @endunless
        </section>
    </main>
</x-layout.main-layout>
