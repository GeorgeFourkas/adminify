<nav
    class="relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all duration-250 ease-soft-in lg:flex-nowrap lg:justify-start">
    <div class="mx-auto flex w-full items-center justify-between px-4 py-1 flex-wrap-inherit">
        <div class="mt-2 flex grow items-center justify-end sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="mb-0 flex md-max:w-full list-none flex-row justify-end pl-0">
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
