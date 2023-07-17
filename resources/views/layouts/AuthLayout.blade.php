<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
{{--   fonts/font-awesome-4.7.0/css/font-awesome.min.css --}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main_login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--===============================================================================================-->
    <link rel = "icon" href = "{{asset('images/logo.png')}}" type = "image/png">

</head>
<body>
<div class="container-login100" style="background-image: url('/images/bg.jpg');">
@yield('content')
</div>


@livewireScripts
</body>
</html>
