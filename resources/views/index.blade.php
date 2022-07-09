<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Home</title>
</head>

<body class="bg-white">
    <!-- Components imported from ./components/ -->
    <x-header /> 
    <x-sidebar />

    <div class="md:pl-[11rem]">
        <div class="flex flex-col gap-4">
            <h1 class="text-3xl">Something</h1>

            @foreach ($leave as $leaves)
                <p>EMPLOYEE</p>
                <p>{{$leaves}}</p>
                <p>{{$leaves}}</p>
            @endforeach

        </div>
        <x-forms /> 
        <x-table />
    </div>

</body>
</html>