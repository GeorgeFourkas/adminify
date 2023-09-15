<nav
    class="relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all duration-250 ease-soft-in lg:flex-nowrap lg:justify-start">
    <div class="mx-auto flex w-full items-center justify-between px-4 py-1 flex-wrap-inherit">
        <div class="mt-2 flex grow items-center justify-end sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex w-full flex-wrap items-stretch rounded-lg transition-all ease-soft">
                <span
                    class="text-sm ease-soft leading-5 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap
                    rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2
                    px-3 text-center font-normal text-slate-500 transition-all">
                </span>
                    {{--                    <form action="{{route('posts.search')}}" method="POST">--}}
                    {{--                        @csrf--}}
                    {{--                        <input type="text"--}}
                    {{--                               name="search"--}}
                    {{--                               class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6--}}
                    {{--                            relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300--}}
                    {{--                            bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500--}}
                    {{--                             focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"--}}
                    {{--                               placeholder="Type here..."/>--}}
                    {{--                    </form>--}}
                </div>
            </div>
            <ul class="mb-0 flex md-max:w-full list-none flex-row justify-end pl-0">
                <!-- online builder btn  -->
                <li class="flex items-center">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <input type="submit"
                               class="cursor-pointer block text-xs tracking-tight px-2 py-2 font-semibold
                                ease-nav-brand text-sm text-slate-500 hover:bg-gradient-to-tl hover:from-purple-700
                                hover:to-pink-500 rounded-lg hover:text-white"
                               value="Logout">
                    </form>
                </li>
                <li class="flex items-center pl-4 xl:hidden" id="burger">
                    <x-icons.burger></x-icons.burger>
                </li>
            </ul>
        </div>
    </div>
</nav>
