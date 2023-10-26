<x-layouts.guest>
    <div class="w-full flex items-center justify-center">
        <div class="w-11/12 rounded-xl py-12 px-9 bg-white ">
            <div class="w-full flex items-center justify-center text-adminify-main-color">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-9 h-9">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z"/>
                </svg>
            </div>
            <div class="text-center text-black text-2xl font-semibold mt-4">
                <h1 class="capitalize">{{ __('adminify.forgot_pwd.title') }}</h1>
            </div>
            <div class="mb-4 text-md text-gray-500 mt-4 text-center first-letter:capitalize">
                {{ __("adminify.forgot_pwd.subtitle") }}
            </div>
            <!-- Session Status -->
            @if(session('status'))
                <div class="px-2 bg-lime-400 text-center rounded-lg">
                    <x-auth-session-status class="mb-4 text-white text-center p-1" :status="session('status')"/>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <x-input-label for="email" class="capitalize" :value="__('adminify.forgot_pwd.email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  required autofocus/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-center mt-8">
                    <button
                        class="capitalize gradient-app-theme px-3 py-2 text-sm text-white rounded-md font-semibold w-full font-admin-sans">
                        {{ __('adminify.forgot_pwd.send') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.guest>
