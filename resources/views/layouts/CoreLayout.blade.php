<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hotel booking site</title>
    @livewireStyles
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel = "icon" href = "{{asset('images/logo.png')}}" type = "image/png">
</head>
<body>

@yield('content')


<script src="{{ url('js/script.js') }}"></script>
@livewireScripts
</body>
</html>
