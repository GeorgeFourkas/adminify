<x-layouts.guest>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="w-11/12 rounded-xl py-12 px-9 bg-white ">
            <div class="w-full flex items-center justify-center text-adminify-main-color">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-9 h-9 text-adminify-main-color">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                </svg>
            </div>
            <div class="text-center text-black text-2xl font-semibold mt-4 capitalize">
                <h1>{{ __('adminify.reset_pwd.title') }}</h1>
            </div>
            <div class="mb-4 text-md text-gray-500 mt-4 text-center">
                {{ __('adminify.reset_pwd.subtitle') }}
            </div>
            @if(session('status'))
                <div class="px-2 bg-lime-400 text-center rounded-lg">
                    <x-auth-session-status class="mb-4 text-white text-center p-1" :status="session('status')"/>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <x-input-label for="email" class="capitalize" :value="__('adminify.registration.fields.email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                  :value="old('email', $request->email)" required autofocus/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
                <div class="mt-4">
                    <x-input-label for="password" class="capitalize" :value="__('adminify.reset_pwd.new_password')"/>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>
                <div class="mt-4">
                    <x-input-label for="password_confirmation"  class="capitalize" :value="__('adminify.reset_pwd.confirm_new_password')"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password" name="password_confirmation" required/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-center mt-8">
                    <button
                        class="gradient-app-theme px-3 py-2 text-sm text-white rounded-md font-semibold w-full ">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </form>
</x-layouts.guest>
