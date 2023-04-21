<nav
    class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto justify-end">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
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
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
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
