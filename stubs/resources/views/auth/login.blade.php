@php use Illuminate\Support\Facades\Route; @endphp
<x-layouts.authentication>
    <div class="w-full lg:w-1/2 flex items-center justify-center h-screen">
        <form method="POST" action="{{ route('login') }}" class="w-2/3 md:mx-5 lg:px-10">
            @if(session('status'))
                <div class="p-1 bg-green-200">
                    <x-auth-session-status class="mb-4 text-white" :status="session('status')"/>
                </div>
            @endif
            <div class="w-full">
                <h1 class="text-3xl capitalize text-center font-nunito font-bold text-transparent gradient-app-theme bg-clip-text">
                    {{ __('adminify.welcome_back') }}
                </h1>
                <p class="text-gray-500 font-light text-center">
                    {{ __('adminify.login_description') }}
                </p>
            </div>
            @csrf
            <div class="w-full">
                <x-input-label class="capitalize" for="email" :value="__('adminify.users.email')"/>

                <x-text-input id="email" class="mt-1 block w-full " type="email" name="email"
                              :value="old('email')" required autofocus/>

                <x-input-error :messages="$errors->get('email') ?? ''" class="mt-2"/>

            </div>
            <!-- Password -->
            <div class="w-full mt-3">
                <x-input-label class="capitalize" for="password" :value="__('adminify.users.password')"/>
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                              :value="old('password')" required/>
                <x-input-error :messages="$errors->get('password') ?? ''" class="mt-2"/>

            </div>
            <div class="my-6 block">
                <x-admin.radio-toggler name="remember" value="1" :label="__('adminify.remember')"/>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between  mt-4">
                @if (Route::hasLocalized('password.request'))
                    <a class="capitalize my-2 md:my-0 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                       href="{{ route('password.request') }}">
                        {{ __('adminify.lost_password') }}
                    </a>
                @endif
                @if(Route::hasLocalized('register'))
                    <a class="my-2 md:my-0 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                       href="{{ route('register') }}">
                        {{ __('adminify.no_account') }}
                    </a>
                @endif
            </div>
            <div class=" mt-4">
                <input type="submit" value="{{ __('adminify.login') }}"
                       class="w-full py-2 capitalize rounded-lg text-white gradient-app-theme hover:scale-105 transition duration-400 cursor-pointer">
            </div>

        </form>
    </div>
</x-layouts.authentication>


