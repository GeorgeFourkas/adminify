<nav
    class="relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all duration-250 ease-soft-in lg:flex-nowrap lg:justify-start">
    <div class="mx-auto flex w-full items-center justify-between px-4 py-1 flex-wrap-inherit">
        <div class="mt-2 flex grow items-center justify-end sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="mb-0 flex md-max:w-full list-none flex-row justify-end pl-0">
                <li class="flex items-center space-x-1 md:space-x-0 md:order-2">
                    <button type="button" data-dropdown-toggle="language-dropdown-menu"
                            class="inline-flex cursor-pointer items-center justify-center rounded-lg px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white">
                        @php $currentLocale = app()->getLocale() @endphp
                        <img src="{{ asset("vendor/blade-flags/language-$currentLocale.svg") }}" alt=""
                             class="h-5 w-5 rounded-full me-3"/>
                        {{ \Locale::getDisplayLanguage($currentLocale, $currentLocale) }}
                    </button>
                    <div id="language-dropdown-menu"
                         class="z-50 my-4 hidden list-none rounded-lg bg-white text-base shadow divide-y divide-gray-100 dark:bg-gray-700">
                        <ul class="py-2 font-medium" role="none">
                            @foreach($locales as $locale)
                                <li>
                                    <a href="{{ Route::localizedUrl($locale) }}" role="menuitem"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="inline-flex items-center">
                                            <img src="{{ asset("vendor/blade-flags/language-$locale.svg") }}" alt=""
                                                 class="rounded-full h-3.5 w-3.5 me-2"/>
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
                               class="block cursor-pointer rounded-lg px-2 py-2 text-xs text-sm font-semibold capitalize tracking-tight text-slate-500 ease-nav-brand hover:from-adminify-main-color hover:to-adminify-secondary-color hover:bg-gradient-to-tl hover:text-white">
                    </form>
                </li>
                <li class="flex items-center pl-4 xl:hidden" id="burger">
                    <x-icons.burger/>
                </li>
            </ul>
        </div>
    </div>

</nav>
