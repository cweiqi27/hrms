<x-layout.main-layout title="Leave" type="dashboard" :role="$staff->role" sidebarLinkType="leave">
    <main class="flex flex-col gap-4">
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
    </main>
</x-layout.main-layout>
