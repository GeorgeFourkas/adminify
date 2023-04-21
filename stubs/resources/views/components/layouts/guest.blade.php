<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title ?? 'Nalcom Website Dashboard' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">


    @vite([
        'resources/css/app.css',
        'resources/css/custom.css',
        'resources/css/scrollbar.css',
        'resources/js/app.js',
        'resources/js/admin/menu-toggler.js',
        'resources/js/admin/dark-mode.js'
    ])
    {{$head ?? ''}}
</head>

<body
    class="m-0 flex bg-gray-50 font-sans text-base font-normal text-slate-500 antialiased leading-default font-nunito">
<main class="ease-soft-in-out w-full xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    {{$slot}}
</main>
</body>
</html>
