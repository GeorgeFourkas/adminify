<x-layouts.guest>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-8">
            <button
                class="gradient-app-theme px-3 py-2 text-sm text-white rounded-md font-semibold w-full font-admin-sans">
                {{__('Reset Password')}}
            </button>
        </div>
    </form>
<x-layouts.guest>
