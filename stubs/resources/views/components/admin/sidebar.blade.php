@php use Illuminate\Support\Facades\Route; @endphp
<aside id="sidebar"
       class="bg-white max-w-xs ease-nav-brand fixed z-999 inset-y-0 my-4 w-2/3 ml-4 block min-h-screen -translate-x-full flex-wrap items-center justify-between  rounded-2xl mb-2 border-0 p-0 antialiased shadow-soft-2xl transition-transform duration-200 xl:left-0 xl:translate-x-0 lg:w-percent-15 overflow-auto">
    <div class="flex items-center justify-center h-19.5">
        <a class="m-0 block whitespace-nowrap px-8 py-6 text-sm text-slate-700"
           href="{{ Route::hasLocalized('home') ? route('home') : '#' }}" target="_blank">
            <img src="{{ Vite::asset('resources/images/admin/nalcom_logo_black.png') }}"
                 class="inline h-16 max-w-full transition-all duration-200 ease-nav-brand" alt="main_logo"/>
        </a>
        <div class="mx-2 block flex w-1/2 items-center justify-end lg:hidden">
            <button class="w-1/2" id="close_sidemenu">
                <x-icons.cross />
            </button>
        </div>
    </div>
    <hr class="mt-0 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent"/>
    <div class="block max-h-screen w-auto grow basis-full items-center h-sidenav">
        <ul class="mt-5 mb-0 mb-5 flex flex-col pl-0">
            <x-admin-side-nav-tile :link="route('dashboard')" text="{{ __('adminify.menu.dashboard') }}"
                                   highlight="{{ str()->contains(url()->current(), route('dashboard')) }}">
                <x-icons.home/>
            </x-admin-side-nav-tile>

            <x-admin-side-nav-tile :link="route('posts')" text="{{ __('adminify.menu.posts') }}"
                                   highlight="{{ str()->contains(url()->current(), route('posts')) || str()->contains(url()->current(), 'post') }}">
                <x-icons.post/>
            </x-admin-side-nav-tile>

            <x-admin-side-nav-tile :link="route('users')" text="{{ __('adminify.menu.users') }}"
                                   highlight="{{ str()->contains(url()->current(), route('users')) }}">
                <x-icons.users/>
            </x-admin-side-nav-tile>

            <x-admin-side-nav-tile :link="route('comments')" text="{{ __('adminify.menu.comments') }}"
                                   highlight="{{ str()->contains(url()->current(), route('comments')) }}">
                <x-icons.comment/>
            </x-admin-side-nav-tile>

            <x-admin-side-nav-tile :link="route('media')" text="{{ __('adminify.menu.media') }}"
                                   highlight="{{ str()->contains(url()->current(), route('media')) }}">
                <x-icons.media/>
            </x-admin-side-nav-tile>

            <li class="mt-4 w-full">
                <p class="ml-2 pl-6 text-xs font-light capitalize leading-tight opacity-80">
                    {{ __('adminify.menu.separator_1') }}
                </p>
            </li>

            <x-admin-side-nav-tile :link="route('tags')" text="{{ __('adminify.menu.tags') }}"
                                   highlight="{{ str()->contains(url()->current(), route('tags')) }}">
                <x-icons.taxonomies/>
            </x-admin-side-nav-tile>

            <x-admin-side-nav-tile :link="route('categories')" text="{{ __('adminify.menu.categories') }}"
                                   highlight="{{ str()->contains(url()->current(), route('categories')) }}">
                <x-icons.category/>
            </x-admin-side-nav-tile>


            <li class="mt-4 w-full">
                <p class="ml-2 pl-6 text-xs font-light leading-tight opacity-80 capitalize">
                    {{ __('adminify.menu.separator_2') }}
                </p>
            </li>
            <x-admin-side-nav-tile :link="route('settings')" text="{{ __('adminify.menu.settings') }}"
                                   highlight="{{ str()->contains(url()->current(), route('settings')) }}">
                <x-icons.settings/>
            </x-admin-side-nav-tile>
        </ul>
    </div>


</aside>
<div class="fixed hidden min-h-screen w-full z-800" id="overlay"
     style="background-color: rgba(0, 0, 0, 0.5);"></div>


