<x-layouts.authentication>
    <div class="w-full lg:w-1/2 flex items-center justify-center h-screen">
        <form method="POST" action="{{ route('login') }}" class="w-2/3 md:mx-5 lg:px-10">
            <div class="w-full">
                <h1 class="text-3xl text-center font-nunito font-bold text-transparent gradient-app-theme bg-clip-text">
                    {{__('Welcome Back')}}
                </h1>
                <p class="text-gray-500 font-light text-center">
                    {{__('Enter your email and password to sign in')}}
                </p>
            </div>
            @csrf
            <!-- Email Address -->
            <div class="w-full">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                              :value="old('email')" required autofocus/>
                <x-input-error :messages="$errors->get('email') ?? ''" class="mt-2"/>
            </div>
            <!-- Password -->
            <div class="w-full mt-3">
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                              :value="old('password')" required autofocus/>
                <x-input-error :messages="$errors->get('password') ?? ''" class="mt-2"/>

            </div>
            <div class="my-6 block">
                <x-admin.radio-toggler name="remember" value="1" label="Remember Me"/>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between  mt-4">
                @if (Route::has('password.request'))
                    <a class="my-2 md:my-0 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                @if(\Illuminate\Support\Facades\Route::has('register.form'))
                    <a class="my-2 md:my-0 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                       href="{{ \Illuminate\Support\Facades\Route::has('register') ? route('register') : '#' }}">
                        {{ __('Dont have an account?') }}
                    </a>
                @endif
            </div>
            <div class=" mt-4">
                <input type="submit" value="{{__('Login')}}"
                       class="w-full py-2 rounded-lg text-white gradient-app-theme hover:scale-105 transition duration-400 cursor-pointer">
            </div>

        </form>
    </div>
</x-layouts.authentication>


