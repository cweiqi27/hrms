<x-layout.main-layout title="Payroll" type="dashboard" :role="$staff->role" sidebarLinkType="monitor">
    <main class="flex flex-col gap-4">
        <section class="flex flex-col gap-4 mt-10 px-2 sm:px-6">
            <form action="{{ route('task.list-get', ['staff' => 'staff_name']) }}" method="GET">
                <div class="flex sm:w-[60rem] mx-auto">
                    <x-form.select name="employee" label-name="">
                        @foreach($staff_list as $staff_lists)
                            <option value="{{$staff_lists->staff_id}}">{{ $staff_lists->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-button.submit
                        class="rounded-r-lg px-4
                            bg-emerald-500 hover:bg-emerald-400
                            text-slate-50"
                    >
                        <ion-icon name="search-outline" />
                    </x-button.submit>
                </div>
            </form>
        </section>
    </main>
</x-layout.main-layout>
