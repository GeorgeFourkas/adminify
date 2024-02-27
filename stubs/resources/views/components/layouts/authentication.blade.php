<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css',])
    {{ $head ?? '' }}
</head>
<body class="h-screen overflow-hidden font-roboto">
<x-auth-session-status class="mb-4" :status="session('status')"/>
<div class="flex w-full items-center justify-center">
    {{ $slot }}
    <div class="relative hidden h-screen w-1/2 select-none lg:block">
        <img class="h-full w-full object-cover"
             src="{{ Vite::asset('resources/images/admin/curved-images/curved8.jpg') }}" alt="">
    </div>
</div>
</body>
</html>
