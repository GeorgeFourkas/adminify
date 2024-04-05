<nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="#" class="flex items-center">
            <img src="{{ \Vite::asset('resources/images/logo.svg') }}" class="h-6 mr-3 sm:h-9"
                 alt="Adminify Logo"/>
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Adminify</span>
        </a>
        <div class="flex items-center lg:order-2">
            <li class="flex items-center md:order-2 space-x-1 md:space-x-0">
                <button type="button" data-dropdown-toggle="language-dropdown-menu"
                        class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    @php $currentLocale = app()->getLocale() @endphp
                    <img src="{{ asset("vendor/blade-flags/language-$currentLocale.svg") }}" alt=""
                         class="w-5 h-5 rounded-full me-3"/>
                    {{ \Locale::getDisplayLanguage($currentLocale, $currentLocale) }}
                </button>
                <div id="language-dropdown-menu"
                     class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                    <ul class="py-2 font-medium" role="none">
                        @foreach($locales as $locale)
                            <li>
                                <a href="{{ Route::localizedUrl($locale) }}" role="menuitem"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <div class="inline-flex items-center">
                                        <img src="{{ asset("vendor/blade-flags/language-$locale.svg") }}" alt=""
                                             class="h-3.5 w-3.5 rounded-full me-2"/>
                                        {{ \Locale::getDisplayLanguage($locale, app()->getLocale()) }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="#" aria-current="page"
                       class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#tools"
                       class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0">
                        Tools
                    </a>
                </li>
                <li>
                    <a href="#features"
                       class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400">
                        Features
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}"
                       class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="#faq"
                       class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0">
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}"
                       class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
