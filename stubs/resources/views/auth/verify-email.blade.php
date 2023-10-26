<x-layouts.guest>

    <div class="flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-11 h-11 text-adminify-main-color">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
        </svg>
    </div>
    <h1 class="text-center text-2xl font-semibold my-3 capitalize">{{ __('adminify.email_verification.title') }}</h1>
    <div class="mb-4 mt-2 text-sm text-gray-600">
        {{ __('adminify.email_verification.description') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="px-2 bg-lime-400 text-center rounded-lg">
            <x-auth-session-status class="mb-4 text-white text-center p-1"
                                   :status="__('adminify.email_verification.success')"/>
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <x-admin.primary-action-button as="submit" :value="__('adminify.email_verification.button')"/>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="underline first-letter:capitalize text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('adminify.email_verification.logout') }}
            </button>
        </form>

    </div>
</x-layouts.guest>
