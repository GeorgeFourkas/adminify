<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Nalcom Website Dashboard' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/admin/menu-toggler.js'])
    @stack('scripts')
    @stack('styles')
    {{$head ?? ''}}
</head>

<body
    class="m-0 flex bg-gray-50 text-base font-normal text-slate-500 antialiased leading-default font-inter"
    data-locale="{{ app()->getLocale() }}"
    data-publishedlocales="{{ json_encode($publishedLanguages) }}"
    data-availableLocales="{{ json_encode($availableLocales) }}">

{{--The followind div is not rendered on the DOM, but its rather there for tailwind JIT compiler usage--}}
<x-admin.sidebar/>
<main class="relative h-full max-h-screen w-full rounded-xl transition-all duration-200 ease-soft-in-out xl:ml-72">
    <x-admin.navbar/>
    {{ $slot }}
</main>
</body>
</html>
