@vite( 'resources/js/year.js')

<footer class="mt-auto w-full bg-footerPurple">
    <!--    Newsletter Signup and basic contact info-->
    <div
        class="mx-auto flex w-full flex-col items-center justify-between border-b border-gray-800 py-10 lg:w-2/3 lg:flex-row">
        <div class="flex items-center justify-center lg:w-4/12">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="h-7 w-7 text-lightPurple lg:h-14 lg:w-14">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                />
            </svg>
            <div class="ml-2 flex flex-col items-start justify-start">
                <a href="mailto:info@nalcom.gr"
                   class="mt-1 text-md font-normal tracking-wide text-white font-nunito">
                    {{__('info@nalcom.gr')}}

                </a>
                <a href="tel:+302313253421"
                   class="mt-2 text-md font-normal tracking-wide text-white font-rubik">
                    {{__('+30 231 325 3421')}}

                </a>
            </div>
        </div>
        <div class="mt-7 flex items-center justify-center lg:mt-0 lg:w-4/12">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="h-8 w-8 text-lightPurple lg:h-12 lg:w-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
            </svg>
            <div class="ml-2 flex flex-col items-start justify-start">
                <h1 class="font-normal tracking-wide text-white text-sm">{{__('Navarchou Kountouriotou ')}}
                    <span
                        class="font-nunito">8</span></h1>
                <h1 class="mt-1 font-normal tracking-wide text-white text-md"><span class="font-nunito">{{__('546 25')}}
                </span>,
                    {{__('Thessaloniki')}}
                </h1>

            </div>
        </div>
        <div class="mt-7 w-full lg:mt-0 lg:w-7/12">
            <form action="#">
                <div class="flex items-center justify-center">
{{--                    <input type="text" placeholder="{{__('Email Address')}}"--}}
{{--                           class="bg-[#131e4e] w-2/3  p-4 text-white font-semibold text-xs border-[#131e4e] focus:outline-none focus:border-[#ffffff]">--}}
{{--                    <input type="submit" value="{{__('sign up')}}"--}}
{{--                           class=" py-4 px-5 lg:px-10 bg-white cursor-pointer uppercase text-white text-xs rounded--}}
{{--                           rounded-md tracking-tighter font-semibold bg-gradient-to-r from-[#9087f0] to-[#6f62ea]">--}}
                </div>
            </form>
        </div>
    </div>
    <!-- Footer Menus-->
    <div
        class="mx-auto flex w-11/12 flex-col items-center justify-between border-b border-gray-800 py-10 lg:w-2/3 lg:flex-row lg:items-start">
        <div class="flex flex-col lg:w-1/4">
            <h1 class="text-lg font-bold tracking-wide text-white">About</h1>
            <h1 class="mt-5 text-sm tracking-wide text-white font-rubik">
                {{__('We prioritize helping small to mid-sized businesses enhance and expand their online presence to achieve greater success.')}}

            </h1>
            <div class="mt-10 flex w-2/3 items-start justify-center lg:mx-auto lg:justify-start">
                <div class="flex w-1/4 justify-center">
                    <a href="#" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                             class="h-4 w-4 text-white hover:text-gray-300">
                            <path fill="currentColor"
                                  d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
                        </svg>
                    </a>
                </div>
                <div class="flex w-1/4 justify-center">
                    <a href="#" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             class="h-4 w-4 text-white hover:text-gray-300">
                            <path fill="currentColor"
                                  d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                        </svg>
                    </a>
                </div>
                <div class="flex w-1/4 justify-center">
                    <a href="#" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                             class="h-4 w-4 text-white hover:text-gray-300">
                            <path fill="currentColor"
                                  d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/>
                        </svg>

                    </a>
                </div>
                <div class="flex w-1/4 justify-center">
                    <a href="#" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                             class="h-4 w-4 text-white hover:text-gray-300">
                            <path fill="currentColor"
                                  d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"/>
                        </svg>
                    </a>
                </div>
                <div class="flex w-1/4 justify-center">
                    <a href="#" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                             class="h-4 w-4 text-white hover:text-gray-300">
                            <path fill="currentColor"
                                  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

{{--        <div class="mt-10 flex flex-col lg:mt-0 lg:w-1/4">--}}
{{--            <h1 class="text-center text-lg font-bold tracking-wide text-white font-nunito">{{__('Services')}}--}}
{{--            </h1>--}}
{{--            <div class="mt-4 flex flex-col justify-start lg:items-center">--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('SEO marketing')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('SEO services')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('pay per click')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('social media')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('SEO Audit')}}--}}

{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="mt-10 flex flex-col lg:mt-0 lg:w-1/4">--}}
{{--            <h1 class="text-center text-lg font-bold tracking-wide text-white font-nunito">--}}
{{--                {{__('Community')}}--}}

{{--            </h1>--}}
{{--            <div class="mt-4 flex flex-col justify-start lg:items-center">--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('our product')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('our services')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('documentation')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('company')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('what we do?')}}--}}

{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="mt-10 flex flex-col lg:mt-0 lg:w-1/4">--}}
{{--            <h1 class="text-center text-lg font-bold tracking-wide text-white font-nunito">Quick Links</h1>--}}
{{--            <div class="mt-4 flex flex-col justify-start lg:items-center">--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('home')}}--}}
{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('about us')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('our cases')}}--}}

{{--                </a>--}}
{{--                <a href="#" class="mt-2 text-sm capitalize tracking-wider text-white hover:text-orangy">--}}
{{--                    {{__('contact')}}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="flex items-center justify-center py-7 text-sm text-gray-500">
        <p class="text-xs">
            {{__('Copyright')}} &copy;
            <span id="year"></span>
            - {{__('Nalcom. All Rights Reserved')}}
        </p>
    </div>
</footer>




