<nav
    class="relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all duration-250 ease-soft-in lg:flex-nowrap lg:justify-start">
    <div class="mx-auto flex w-full items-center justify-between px-4 py-1 flex-wrap-inherit">
        <div class="mt-2 flex grow items-center justify-end sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="mb-0 flex md-max:w-full list-none flex-row justify-end pl-0">
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

                <li class="flex items-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="{{ __('adminify.logout') }}"
                               class="cursor-pointer capitalize block text-xs tracking-tight px-2 py-2 font-semibold ease-nav-brand text-sm text-slate-500 hover:bg-gradient-to-tl hover:from-adminify-main-color hover:to-adminify-secondary-color rounded-lg hover:text-white">
                    </form>
                </li>
                <li class="flex items-center pl-4 xl:hidden" id="burger">
                    <x-icons.burger/>
                </li>
            </ul>
        </div>
    </div>

</nav>
