@aware(['title', 'type', 'role', 'sidebarLinkType'])

<!DOCTYPE html>
@if ($type === 'auth')
<html lang="en" class="h-full">
@else
<html lang="en">
@endif
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/HRMS-icon.ico') }}" type="image/x-icon">

    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @endpush

    <title>HRMS - {{ $title }}</title>
</head>

@if ($type === 'auth')
<body class="bg-white h-full">
@else
<body class="bg-white">
@endif
    @if($type === 'dashboard' || $type === 'index')
        <x-layout.container>
            <x-layout.header :role="$role" />
            <x-layout.sidebar :sidebarLinkType="$sidebarLinkType" />
            <x-layout.content :type="$type" :sidebarLinkType="$sidebarLinkType">
                {{ $slot }}
                <x-alert.flash />
            </x-layout.content>
        </x-layout.container>
    @else
        <div class="relative min-h-full">
            <x-layout.content :type="$type">
                {{ $slot }}
                <x-alert.flash />
            </x-layout.content>
            <x-layout.footer />
        </div>
    @endif
</body>
</html>
