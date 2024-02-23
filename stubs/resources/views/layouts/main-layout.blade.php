<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta_tags')
    @vite(['resources/css/app.css'])
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Taviraj:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=&display=swap"
        rel="stylesheet">
    @stack('styles')
    @stack('scripts')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
{!! $slot !!}
</body>
</html>
