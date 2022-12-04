<x-layout.main-layout title="Monitor" type="dashboard" :role="$staff_role" sidebarLinkType="monitor">
    <main class="flex flex-col gap-4">
        {{-- Search bar --}}
        <section class="flex flex-col gap-4 mt-10 px-2 sm:px-6 md:mx-auto">
            <x-search
                route="search.staff.get"
                name="search"
                labelName="Search by id or name"
                placeholderName="John Doe"
            >
                <ion-icon name="search-outline"></ion-icon>
            </x-search>

            <form action="{{ route('search.staff.all') }}" method="GET">
                @csrf
                <x-button.submit class="rounded-lg p-2 text-emerald-50 bg-emerald-500 hover:bg-emerald-400">
                    Show all
                </x-button.submit>
            </form>
        </section>

        {{-- Search Results and Table --}}
        <section class="md:mx-auto">
            @unless (!isset($staff_details))
                <x-alert.message :message="$message" :message_type="$message_type" />

                <x-table titleCsv="Name,Department,Salary,Contact No,Email,Verified,Link">
                    @foreach ($staff_details as $staffs)
                    <tr class="odd:bg-emerald-50 even:bg-emerald-100">
                        <td class="p-3 ">
                            <a
                                href="{{ route('monitor.show-staff', $staffs) }}"
                                class="hover:underline"
                            >
                                {{ $staffs->name }}
                            </a>
                        </td>
                        <td class="p-3 ">{{ $staffs->department }}</td>
                        <td class="p-3 ">{{ $staffs->salary }}</td>
                        <td class="p-3 ">{{ $staffs->contact_no }}</td>
                        <td class="p-3 ">{{ $staffs->email }}</td>
                        @if (isset($staffs->email_verified_at))
                            <td class="p-3 ">{{ $staffs->email_verified_at }}</td>
                        @else
                            <td class="p-3 ">Not verified</td>
                        @endif
                        <td class="p-3  text-2xl text-center">
                            <a
                                href="{{ route('monitor.show-staff', $staffs) }}"
                                class="hover:text-gray-400"
                            >
                                <ion-icon name="link-outline" class="pointer-events-none"></ion-icon>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </x-table>
            @endunless
        </section>

        @if(isset($message) && !isset($staff_details))
            <x-alert.message :message="$message" :message_type="$message_type" />
        @endif

    </main>

</x-layout.main-layout>
