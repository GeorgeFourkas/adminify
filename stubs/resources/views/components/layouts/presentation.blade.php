<!--
     __    __            __
    /  \  /  |          /  |
    $$  \ $$ |  ______  $$ |  _______   ______   _____  ____
    $$$  \$$ | /      \ $$ | /       | /      \ /     \/    \
    $$$$  $$ | $$$$$$  |$$ |/$$$$$$$/ /$$$$$$  |$$$$$$ $$$$  |
    $$ $$ $$ | /    $$ |$$ |$$ |      $$ |  $$ |$$ | $$ | $$ |
    $$ |$$$$ |/$$$$$$$ |$$ |$$ \_____ $$ \__$$ |$$ | $$ | $$ |
    $$ | $$$ |$$    $$ |$$ |$$       |$$    $$/ $$ | $$ | $$ |
    $$/   $$/  $$$$$$$/ $$/  $$$$$$$/  $$$$$$/  $$/  $$/  $$/
-->


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ??'Nalcom | Digital Agency in Thessaloniki'}}</title>
    <link rel="icon" type="image/png" href="{{Vite::asset('resources/images/nalcom_favicon.png')}}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap">
    @vite(
        [
            'resources/css/custom.css',
            'resources/js/burger.js',
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/js/font-family-switcher.js',
            'resources/js/fixed-navbar.js',
        ]
    )
    {{$head ?? ''}}
</head>

<div class="hidden bg-red-200 bg-yellow-100 bg-lime-50 text-red-600 text-lime-500 transition duration-1000"></div>

<body class="flex min-h-screen flex-col overflow-x-hidden font-montserrat" data-locale="{{App::getLocale()}}">
@role('administrator')
<a href="{{ route('dashboard') }}">
    <div class="fixed left-4 bottom-10 z-50 cursor-pointer animate-bounce-slow">
        <div
            class="flex h-10 w-10 items-center justify-center rounded-full border-4 text-black transition duration-300 bg-footerPurple border-footerPurple group shadow-soft-2xl hover:border-orangy hover:bg-white">
            <p class="text-center text-xs text-white group-hover:text-footerPurple group-hover:font-semibold">{{ __('Admin') }}</p>
        </div>
    </div>
</a>
@endrole
<x-bubbles></x-bubbles>
<div class="hidden font-source"></div>
{{$slot}}



@if(Request::url() !== route('start.new.project'))
    <a href="{{ route('start.new.project') }}">
        <div class="fixed right-4 bottom-10 z-50 cursor-pointer animate-bounce-slow">
            <div
                class="flex h-20 w-20 items-center justify-center rounded-full border-4 text-black transition duration-300 bg-footerPurple border-footerPurple group shadow-soft-2xl hover:border-orangy hover:bg-white">
                <p class="text-center text-white group-hover:text-footerPurple group-hover:font-semibold">{{__('Start a Project')}}</p>
            </div>
        </div>
    </a>
@endif

<x-footer></x-footer>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FXDFMFBDPG"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-FXDFMFBDPG');
</script>
</body>
</html>


