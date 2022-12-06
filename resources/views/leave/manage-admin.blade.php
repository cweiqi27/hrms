<x-layout.main-layout title="Leave" type="dashboard" :role="$staff->role" sidebarLinkType="leave">
    <main class="flex flex-col gap-4 p-4">
        <x-title name="Manage Leave"></x-title>
        <section class="w-full p-4 md:w-1/2 mx-auto mt-4">
            <form action="{{ route('leave.get') }}" method="GET">
                @csrf
                @if(count($managed_staff) === 0)
                    <h2 class="text-slate-600 text-xl">No employee assigned to you at the moment.</h2>
                @else
                    <x-form.select name="employee" label-name="Employee" class="flex w-[60rem]">
                        <option value="" selected disabled>Select employee</option>
                        @foreach($managed_staff as $managed_staffs)
                            <option value="{{$managed_staffs->staff_id}}">{{ $managed_staffs->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-button.form-submit>
                        Get Leave
                    </x-button.form-submit>
                @endif
            </form>
        </section>
        @unless(!isset($leaves))
            <section class="md:mx-auto">
                <x-table titleCsv="Leave Date,Leave Type,Status,Action">
                    @foreach($leaves as $leave)
                        <tr class="odd:bg-emerald-50 even:bg-emerald-100">
                            <td class="p-3">{{ $leave->leave_date }}</td>
                            <td class="p-3">{{ $leave->leave_type }}</td>
                            <td class="p-3">{{ $leave->leave_status }}</td>
                            <td class="flex p-3">
                                @if($leave->leave_status === 'pending')
                                    <form action="{{ route('leave.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task" value="{{ $leave->leave_id }}">
                                        <input type="hidden" name="status" value="approved">
                                        <x-button.submit>
                                            <ion-icon name="checkmark-circle-sharp" class="text-green-400 hover:text-green-300 text-xl" />
                                        </x-button.submit>
                                    </form>
                                    <form action="{{ route('leave.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task" value="{{ $leave->leave_id }}">
                                        <input type="hidden" name="status" value="accepted">
                                        <x-button.submit>
                                            <ion-icon name="close-circle-sharp" class="text-amber-400 hover:text-amber-300 text-xl" />
                                        </x-button.submit>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </section>
        @endunless
    </main>
</x-layout.main-layout>
