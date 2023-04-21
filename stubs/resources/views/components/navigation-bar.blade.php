<div id="website_navbar"
     class="transition duration-500 py-5 px-6 md:px-1 lg:px-0 z-50 {{$transparent ? 'bg-transparent' : 'bg-footerPurple'}}">
    <nav class="">
        <div class="mx-auto max-w-7xl">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 right-0 flex items-center lg:hidden">
                    <x-burger-icon></x-burger-icon>
                </div>
                <div class="flex flex-1 items-center justify-between sm:items-stretch">
                    <div class="flex flex-shrink-0 items-center py-2">
                        <a href="{{  route('home') }}">
                            <img class="block h-20 w-auto lg:hidden select-none"
                                 src="{{Vite::asset('resources/images/nalcom_logo.png')}}"
                                 alt="Nalcom Logo">
                            <img class="hidden h-20  w-auto lg:block select-none"
                                 src="{{Vite::asset('resources/images/nalcom_logo.png')}}"
                                 alt="Nalcom Logo">
                        </a>
                    </div>
                    <div class="hidden lg:flex items-center">
                        <div class="flex space-x-4">
                            <x-navigation-link routeName="home"
                                               :link="route('home')"
                                               text="{{__('home')}}">
                            </x-navigation-link>
                            <x-navigation-link routeName="services"
                                               :link="route('services')"
                                               text="{{__('services')}}">
                            </x-navigation-link>
                            <x-navigation-link routeName="about"
                                               :link="route('about')"
                                               text="{{__('about')}}">
                            </x-navigation-link>
                            <x-navigation-link routeName="articles"
                                               :link="route('articles')"
                                               text="{{__('articles')}}">
                            </x-navigation-link>
                            <x-navigation-link routeName="contact"
                                               :link="route('contact')"
                                               text="{{__('contact')}}">
                            </x-navigation-link>
                        </div>
                    </div>
                    <div class="hidden lg:flex items-center">
                        <x-language-switcher/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden" id="mobile-menu">
            <div class="flex items-start mt-7 justify-between w-10/12">
                <div class="space-y-5 px-2 pt-2 pb-3">
                    <x-navigation-link routeName="home"
                                       :link="route('home')"
                                       text="{{__('home')}}">
                    </x-navigation-link>
                    <x-navigation-link routeName="services"
                                       :link="route('services')"
                                       text="{{__('services')}}">
                    </x-navigation-link>
                    <x-navigation-link routeName="about"
                                       :link="route('about')"
                                       text="{{__('about')}}">
                    </x-navigation-link>
                    <x-navigation-link routeName="contact"
                                       :link="route('contact')"
                                       text="{{__('contact')}}">
                    </x-navigation-link>
                </div>
                <x-language-switcher/>
            </div>
        </div>
    </nav>
</div>
