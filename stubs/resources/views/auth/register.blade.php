<x-layouts.authentication>
    <div class="flex h-screen w-full items-center justify-center lg:w-1/2">
        <form method="POST" action="{{ route('register') }}" class="w-11/12 lg:w-2/3">
            <div class="my-5 w-full">
                <h1 class="bg-clip-text text-center text-3xl font-bold capitalize text-transparent font-nunito gradient-app-theme">
                    {{ __('adminify.registration.title') }}
                </h1>
                <p class="text-center font-light text-gray-500">
                    {{ __('adminify.registration.subtitle') }}
                </p>
            </div>
            @csrf
            <div class="flex flex-col items-center justify-center md:flex-row lg:space-x-5">
                <!-- Full Name -->
                <div class="mt-3 w-10/12 lg:mt-0 lg:w-1/2">
                    <x-input-label for="name" class="capitalize" :value="__('adminify.registration.fields.full_name')"/>
                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                  :value="old('name')" required autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <!-- Email -->
                <div class="mt-3 w-10/12 lg:mt-0 lg:w-1/2">
                    <x-input-label for="email" class="capitalize" :value="__('adminify.registration.fields.email')"/>
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                                  :value="old('email')" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
            </div>
            <div class="mt-4 flex flex-col items-center justify-center md:flex-row lg:space-x-5">
                <!-- Password -->
                <div class="mt-3 w-10/12 lg:mt-0 lg:w-1/2">
                    <x-input-label for="password" class="capitalize" :value="__('adminify.registration.fields.password')"/>
                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                                  :value="old('password')" required autofocus/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>
                <!-- Confirm Password -->
                <div class="mt-3 w-10/12 lg:mt-0 lg:w-1/2">
                    <x-input-label class="capitalize" for="password_confirmation"
                                   :value="__('adminify.registration.fields.password_confirmation')"/>
                    <x-text-input id="password_confirmation" class="mt-1 block w-full"
                                  type="password" name="password_confirmation" required
                                  autocomplete="new-password"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-start">
                <div class="mt-3 w-10/12 lg:mt-0 lg:w-1/2">
                    <a class="rounded-md text-sm capitalize text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100"
                       href="{{ route('login') }}">
                        {{ __('adminify.registration.fields.already_registered') }}
                    </a>
                </div>
            </div>
            <div class="mt-4">
                <input type="submit" value="{{ __('adminify.login') }}"
                       class="w-full cursor-pointer rounded-lg py-2 capitalize text-white transition gradient-app-theme duration-400 hover:scale-105">
            </div>

        </form>
    </div>
</x-layouts.authentication>


