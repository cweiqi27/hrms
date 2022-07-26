@props(['title', 'type'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="img/HRMS-icon.ico" type="image/x-icon">
    <link href='fullcalendar/main.css' rel='stylesheet' />

    @push('scripts')
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src='fullcalendar/main.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let calendarEl = document.getElementById('calendar');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });
        </script>
    @endpush
    
    <title>HRMS - {{ $title }}</title>
</head>

<body class="bg-white p-0">
    @if($type === 'dashboard')    
        <x-header /> 
        <x-sidebar />
        <x-content :type="$type">
            {{ $slot }}
            <x-alert.message />
        </x-content>
    @else
        <x-content :type="$type">
            {{ $slot }}
            <x-alert.message />
        </x-content>
    @endif
</body>
</html>