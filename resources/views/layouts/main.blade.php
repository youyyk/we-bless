<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title','We-Bless')</title>
</head>
<body class="bg-green-50">
    @include('layouts.menu')

    <div class="p-4">
        @yield('content')
    </div>

    <div>
        Footer
    </div>
</body>
</html>
