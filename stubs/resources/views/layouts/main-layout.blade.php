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
    @stack('styles')
    @stack('scripts')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
{!! $slot !!}
</body>
</html>
