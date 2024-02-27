@pushonce('scripts')
    @vite('resources/js/admin/confirm-modal.js')
@endpushonce

<div id="confirmation-modal"
     class="fixed top-0 right-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-1000">
    <div
        class="overflow-y-auto overflow-x-hidden p-4 h-modal md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md md:h-auto">
            <div class="relative z-50 rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button" id="close" data-modal-hide="popup-modal"
                        class="absolute top-3 ml-auto inline-flex items-center rounded-lg bg-transparent text-sm text-gray-400 right-2.5 group p-1.5 hover:bg-red-200 dark:hover:bg-gray-800 dark:hover:text-white">
                    <x-icons.cross class="group-hover:text-white"/>
                    <span class="sr-only">close</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ __('adminify.deletion_confirmation') }}
                    </h3>
                    <p class="text-sm">
                        {{ __('adminify.are_you_sure') }}
                        <br>
                        {{ __('adminify.action_warning') }}
                    </p>
                    <button type="button" id="confirmation" tabindex="-1"
                            class="mt-5 mr-2 inline-flex items-center rounded-lg px-5 text-center text-sm font-medium text-white gradient-app-theme py-2.5 focus:outline-none focus:ring-4 focus:ring-red-300">
                        {{ __('adminify.affirmative') }}
                    </button>
                    <button type="button" id="cancel"
                            class="rounded-lg border border-gray-200 bg-white px-5 text-sm font-medium text-gray-500 py-2.5 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">
                        {{ __('adminify.negative') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
