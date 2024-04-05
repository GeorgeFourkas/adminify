<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta_tags')
    @vite(['resources/css/app.css', 'resources/js/collapse.js'])
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap">
    @stack('styles')
    @stack('scripts')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body class="antialiased font-roboto scroll-smooth">
<header class="w-full">
    <x-navbar/>
</header>

{!! $slot !!}

<footer class="w-full py-10">
    <div class="relative  px-0 font-light leading-7  z-10">
        <div class="px-3 mx-auto w-full leading-7 max-w-[1300px]">
            <div class="flex justify-center items-start  flex-wrap -mx-3 mt-0 ">
                <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full xl:w-1/4 xl:flex-none md:w-1/2 md:flex-none">
                    <div class="p-0 bg-transparent shadow-none">
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <div class="flex space-x-3">
                                    <img class="hidden h-[2rem] w-auto lg:block" alt="Supper_Club_Navigation_Logo"
                                         src="{{ Vite::asset('resources/images/logo.svg') }}">
                                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Adminify</span>
                                </div>
                                <p class="mb-8 mt-7">
                                    Adminify is an open source package that revolutionizes the way you build & manage
                                    your websites.
                                </p>
                            </div>
                        </div>
                        <div class="sm:w-full sm:flex-none">
                            <div class="inline-block">
                                <div class="p-0 m-0 flex items-center justify-center flex-wrap">
                                    <a target="_blank" href="https://www.facebook.com/"
                                       class="flex items-center justify-center outline-none mt-0 p-4 mr-2 mb-4 ml-0 text-left bg-purple-700 group hover:bg-beige transition-all duration-400 shadow-2xl rounded-md cursor-pointer">
                                        <svg class="w-4 h-4 fill-white stroke-black " viewBox="-5 0 20 20" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g stroke-width="0"/>
                                            <g stroke-linecap="round" stroke-linejoin="round"/>
                                            <g>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                   fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                       transform="translate(-385.000000, -7399.000000)"
                                                       class="fill-white">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M335.821282,7259 L335.821282,7250 L338.553693,7250 L339,7246 L335.821282,7246 L335.821282,7244.052 C335.821282,7243.022 335.847593,7242 337.286884,7242 L338.744689,7242 L338.744689,7239.14 C338.744689,7239.097 337.492497,7239 336.225687,7239 C333.580004,7239 331.923407,7240.657 331.923407,7243.7 L331.923407,7246 L329,7246 L329,7250 L331.923407,7250 L331.923407,7259 L335.821282,7259 Z"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <a target="_blank" href="https://www.instagram.com/"
                                       class="flex items-center justify-center outline-none mt-0 p-4 mr-2 mb-4 ml-0 text-left bg-purple-700 group hover:bg-beige transition-all duration-400 shadow-2xl rounded-md cursor-pointer">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">

                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"/>

                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                                      fill="#ffffff"/>
                                                <path
                                                    d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                                                    fill="#ffffff"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                                                      fill="#ffffff"/>
                                            </g>

                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full xl:w-1/4 xl:flex-none md:w-1/2 md:flex-none">
                    <div class="p-0 bg-transparent shadow-none">
                        <h4 class="relative p-0 mx-0 mt-0 mb-8 font-sans text-2xl not-italic font-normal leading-8 capitalize break-words xl:text-2xl">
                            Pages
                        </h4>
                        <div class="">
                            <ul class="grid grid-cols-1 gap-0.5">
                                <li class=" mx-0 mt-0 mb-4  text-left text-beige w-1/2 group">
                                    <a href=""
                                       class="inline-block relative py-1 pr-0 px-2 w-full cursor-pointer transition-all duration-100 ease-in outline-none  list-none text-sm group-hover:text-beige capitalize">
                                        Home
                                    </a>
                                </li>
                                <li class=" mx-0 mt-0 mb-4  text-left text-beige w-1/2 group">
                                    <a href=""
                                       class="inline-block relative py-1 pr-0 px-2 w-full cursor-pointer transition-all duration-100 ease-in outline-none  list-none  text-sm group-hover:text-beige capitalize">
                                        Features
                                    </a>
                                </li>
                                <li class=" mx-0 mt-0 mb-4  text-left text-beige w-1/2 group">
                                    <a href=""
                                       class="inline-block relative py-1 pr-0 px-2 w-full cursor-pointer transition-all duration-100 ease-in outline-none  list-none  text-sm group-hover:text-beige capitalize">
                                        Blog
                                    </a>
                                </li>
                                <li class=" mx-0 mt-0 mb-4  text-left text-beige w-1/2 group">
                                    <a href=""
                                       class="inline-block relative py-1 pr-0 px-2 w-full cursor-pointer transition-all duration-100 ease-in outline-none  list-none  text-sm group-hover:text-beige capitalize">
                                        Faq
                                    </a>
                                </li>
                                <li class=" mx-0 mt-0 mb-4  text-left text-beige w-1/2 group">
                                    <a href=""
                                       class="inline-block relative py-1 pr-0 px-2 w-full cursor-pointer transition-all duration-100 ease-in outline-none  list-none  text-sm group-hover:text-beige capitalize">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full xl:w-1/4 xl:flex-none md:w-1/2 md:flex-none">
                    <div class="p-0 bg-transparent shadow-none">
                        <h4 class="relative p-0 mx-0 mt-0 mb-8 font-sans text-2xl not-italic font-normal leading-8 break-words xl:text-2xl capitalize">
                            Contact
                        </h4>
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <ul class="pl-0 m-0">
                                    <li class="flex items-center mx-0 mt-0 mb-4 text-left">
                                        <a href="tel:+302310316120"
                                           class="flex items-center justify-center space-x-2 p-0 cursor-pointer transition-all ease-in-out duration-500 outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="w-5 h-5  mx-3">
                                                <path fill-rule="evenodd"
                                                      d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span class="block">
                                                <span class="">2313 253-421</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="flex items-center space-x-2 mx-0 mt-0 mb-4 text-left">
                                        <a href="mailto:"
                                           class="flex items-center justify-center space-x-2 p-0 cursor-pointer transition-all ease-in-out duration-500 outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="w-5 h-5 mx-3">
                                                <path
                                                    d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"/>
                                                <path
                                                    d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"/>
                                            </svg>
                                            <span class="">adminify@nalcom.gr</span>
                                        </a>
                                    </li>
                                    <li class="flex items-start  space-x-2 mx-0 mt-0 mb-4 text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-6 h-6  mx-3">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"/>
                                        </svg>
                                        <a target="_blank" class="hover:text-beige" href="#">
                                            <span class="">
                                                Nav. Kountouriou 3
                                                <br>
                                                Thessaloniki
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full xl:w-1/4 xl:flex-none md:w-1/2 md:flex-none">
                    <div class="p-0 mb-0 bg-transparent shadow-none">
                        <h4 class="relative p-0 mx-0 mt-0 mb-8 font-sans text-2xl not-italic font-normal leading-8 capitalize break-words xl:text-2xl capitalize">
                            Schedule
                        </h4>
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <ul class="pl-0 m-0">

                                    <li class="flex justify-between pb-1 mx-0 mt-0 mb-1 text-left border-b border-solid border-neutral-500">
                                        <span class="">Monday</span>
                                        <span class="">10:00 - 21:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <ul class="pl-0 m-0">

                                    <li class="flex justify-between pb-1 mx-0 mt-0 mb-1 text-left border-b border-solid border-neutral-500">
                                        <span class="">Tuesday</span>
                                        <span class="">10:00 - 21:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <ul class="pl-0 m-0">
                                    <li class="flex justify-between pb-1 mx-0 mt-0 mb-1 text-left border-b border-solid border-neutral-500">
                                        <span class="">Wednesday</span>
                                        <span class="">10:00 - 21:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 mb-0 bg-transparent shadow-none">
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <ul class="pl-0 m-0">
                                    <li class="flex justify-between pb-1 mx-0 mt-0 mb-1 text-left border-b border-solid border-neutral-500">
                                        <span class="">Thursday</span>
                                        <span class="">10:00 - 21:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 mb-0 bg-transparent shadow-none">
                        <div class="flex flex-wrap -mx-3 mt-0">
                            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full sm:w-full sm:flex-none">
                                <ul class="pl-0 m-0">
                                    <li class="flex justify-between pb-1 mx-0 mt-0 mb-1 text-left border-b border-solid border-neutral-500">
                                        <span class="">Friday</span>
                                        <span class="">10:00 - 21:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center text-gray-500">
        <span class="inline-block w-full font-light leading-7 text-center">
            Copyright 2023 &copy; All Rights Reserved.
        </span>
        <span class="inline-block w-full font-light leading-7 text-center text-sm mt-1.5">
            A
            <a href="https://nalcom.gr/" target="_blank" class="font-semibold text-purple-700">
                Nalcom
            </a>
            Production
        </span>
    </div>
</footer>
</body>
</html>
