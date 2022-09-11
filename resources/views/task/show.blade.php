<x-layout.main-layout title="Task" type="dashboard" :role="$staff->role" sidebarLinkType="task">

    <section class="flex flex-col gap-4">

        {{--Admin--}}
        @unless($staff->role === 'employee')
            <x-title name="Review Task" class="mx-4 mt-2"/>
            {{--Search--}}
            <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
                <form action="{{ route('task.list-get', 'test') }}" method="GET">
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
                @endif
            </section>

            <section class="mx-4">
                @unless(!isset($task))
                    @if(isset($employee))
                        @foreach($employee as $employee_task)
                            <x-title :name="$employee_task->name" class="mb-8" />
                        @endforeach
                    @endif

                    {{--Legend--}}
                    <x-legend-color legend="Assigned" class="bg-sky-400" />
                    <x-legend-color legend="Accepted" class="bg-lime-400" />
                    <x-legend-color legend="Review" class="bg-violet-400" />

                    {{--Message--}}
                    @php
                        $message_type === 'info'
                            ? $message = $task_count . ' active task(s).'
                            : $message = 'No active task.';
                    @endphp
                    <x-alert.message :message="$message" :message_type="$message_type" />

                    {{--Task Cards--}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 grid-flow-rows gap-2 my-8">
                        @foreach ($task as $tasks)
                            @php
                                $date = \Carbon\Carbon::parse($tasks->task_assign_date)
                                                        ->format('F j,');
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
                            <x-card.listing-card class="items-center border-t-8 {{ $color }} bg-slate-500">
                                @if(isset($is_list_all))
                                    <h1 class="text-slate-200 text-2xl font-semibold">
                                        {{ $task_employee }}
                                    </h1>
                                @endif

                                <span class="">
                                <h2 class="text-slate-300 text-md font-medium">
                                    {{ $date }}
                                </h2>
                                <h2 class="text-slate-300 text-md font-medium">
                                    {{ $time }}
                                </h2>
                            </span>

                                <span class="">
                                <h1 class="text-slate-200 text-2xl font-semibold">
                                    {{ $tasks->task_name }}
                                </h1>
                            </span>

                                <span class="flex gap-4">
                                @if($tasks->task_status === 'review')
                                    <form action="{{ route('task.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task" value="{{ $tasks->task_id }}">
                                        <input type="hidden" name="status" value="completed">
                                        <x-button.submit>
                                            <ion-icon name="checkmark-circle-sharp" class="text-green-400 hover:text-green-300 text-xl" />
                                        </x-button.submit>
                                    </form>
                                    <form action="{{ route('task.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task" value="{{ $tasks->task_id }}">
                                        <input type="hidden" name="status" value="accepted">
                                        <x-button.submit>
                                            <ion-icon name="close-circle-sharp" class="text-amber-400 hover:text-amber-300 text-xl" />
                                        </x-button.submit>
                                    </form>
                                @endif
                                <form action="{{ route('task.delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task" value="{{ $tasks->task_id }}">
                                    <x-button.submit>
                                        <ion-icon name="trash-bin-sharp" class="text-red-400 hover:text-red-300 text-xl" />
                                    </x-button.submit>
                                </form>
                            </span>
                            </x-card.listing-card>
                        @endforeach
                    </div>
                @endunless
            </section>
        {{--Employee--}}
        @else
            <x-title name="Task List" class="mx-4 mt-2"/>
            <section class="mx-4">
                {{--Legend--}}
                <x-legend-color legend="Assigned" class="bg-sky-400" />
                <x-legend-color legend="Accepted" class="bg-lime-400" />
                <x-legend-color legend="Review" class="bg-violet-400" />

                {{--Message--}}
                @php
                    $message_type === 'info'
                        ? $message = $task_count . ' active task(s).'
                        : $message = 'No active task.';
                @endphp
                <x-alert.message :message="$message" :message_type="$message_type" />

                {{--Task Cards--}}
                <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 grid-flow-rows gap-2 my-8">
                    @foreach ($task as $tasks)
                        @php
                            $date = \Carbon\Carbon::parse($tasks->task_assign_date)
                                                    ->format('F j,');
                            $time = \Carbon\Carbon::parse($tasks->task_assign_date)
                                                    ->format('h:i A');
                            if($tasks->task_status === 'assigned') {
                                $color = 'border-sky-400';
                            } elseif($tasks->task_status === 'accepted') {
                                $color = 'border-lime-400';
                            } else {
                                $color = 'border-violet-400';
                            }
                        @endphp
                        <x-card.listing-card class="items-center border-t-8 {{ $color }} bg-slate-500">
                            <span class="">
                                    <h2 class="text-slate-300 text-md font-medium">
                                        {{ $date }}
                                    </h2>
                                    <h2 class="text-slate-300 text-md font-medium">
                                        {{ $time }}
                                    </h2>
                                </span>

                            <span class="">
                                    <h1 class="text-slate-200 text-2xl font-semibold">
                                        {{ $tasks->task_name }}
                                    </h1>
                                </span>

                            <span class="flex gap-4">
                                @if($tasks->task_status === 'assigned')
                                    <form action="{{ route('task.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task" value="{{ $tasks->task_id }}">
                                        <input type="hidden" name="status" value="accepted">
                                        <x-button.submit>
                                            <ion-icon name="checkmark-circle-sharp" class="text-green-400 hover:text-green-300 text-xl" />
                                        </x-button.submit>
                                    </form>
                                @elseif($tasks->task_status === 'accepted')
                                    <form action="{{ route('task.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task" value="{{ $tasks->task_id }}">
                                        <input type="hidden" name="status" value="review">
                                        <x-button.submit>
                                            <ion-icon name="book" class="text-fuchsia-400 hover:text-fuchsia-300 text-xl" />
                                        </x-button.submit>
                                    </form>
                                @elseif($tasks->task_status === 'review')
                                    <ion-icon name="reload-outline" class="text-slate-50 text-xl animate-spin" />
                                @endif
                            </span>
                        </x-card.listing-card>
                    @endforeach
                </div>
            </section>
    @endunless
</x-layout.main-layout>
