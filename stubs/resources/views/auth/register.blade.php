<x-layouts.authentication>
    <div class="w-full lg:w-1/2 flex items-center justify-center h-screen ">
        <form method="POST" action="{{ route('register') }}" class="w-11/12 lg:w-2/3">
            <div class="w-full my-5">
                <h1 class="text-3xl text-center font-nunito font-bold text-transparent gradient-app-theme bg-clip-text">
                    {{__('Create New Account')}}
                </h1>
                <p class="text-gray-500 font-light text-center">
                    {{__('Fill in the required credentials to create your account')}}
                </p>
            </div>
            @csrf
            <div class="flex flex-col md:flex-row items-center justify-center lg:space-x-5">
                <!-- Full Name -->
                <div class="w-10/12 lg:w-1/2 mt-3 lg:mt-0">
                    <x-input-label for="name" :value="__('Full name')"/>
                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                  :value="old('name')" required autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <!-- Email -->
                <div class="w-10/12 lg:w-1/2 mt-3 lg:mt-0">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                                  :value="old('email')" required autofocus/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-center lg:space-x-5 mt-4">
                <!-- Password -->
                <div class="w-10/12 lg:w-1/2 mt-3 lg:mt-0">
                    <x-input-label for="password" :value="__('Password')"/>
                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                                  :value="old('password')" required autofocus/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>
                <!-- Confirm Password -->
                <div class="w-10/12 lg:w-1/2 mt-3 lg:mt-0">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password" name="password_confirmation" required
                                  autocomplete="new-password"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>
            </div>

            <div class="flex items-center justify-start mt-4">
                <div class="w-10/12 lg:w-1/2 mt-3 lg:mt-0">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100
                              rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </div>

            <div class=" mt-4">
                <input type="submit" value="{{__('Login')}}"
                       class="w-full py-2 rounded-lg text-white gradient-app-theme hover:scale-105 transition duration-400 cursor-pointer">
            </div>

        </form>
    </div>
</x-layouts.authentication>


