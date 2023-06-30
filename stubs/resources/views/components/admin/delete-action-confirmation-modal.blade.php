@pushonce('scripts')
    @vite('resources/js/admin/confirm-modal.js')
@endpushonce

<div
    class="fixed top-0 right-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-1000"
    id="confirmation-modal">
    <div
        class="overflow-y-auto overflow-x-hidden p-4 h-modal md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md md:h-auto">
            <div class="z-50 relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button" id="close"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent group hover:bg-red-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                    <x-icons.cross class="group-hover:text-white"></x-icons.cross>
                    <span class="sr-only">{{ __('Close modal') }}</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ __('Delete Confirmation') }}
                    </h3>
                    <p class="text-sm">
                        {{ __('Are you sure you want to delete this record?') }}
                        <br>
                        {{ __('The action cannot be undone, deletion will be permanent') }}
                    </p>
                    <button type="button" id="confirmation" tabindex="-1"
                            class="mt-5 text-white gradient-app-theme focus:ring-4 focus:outline-none focus:ring-red-300
                                   font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5
                                   text-center mr-2">
                        {{__("Yes, I'm sure")}}
                    </button>

                    <button type="button" id="cancel"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        {{__('No, cancel')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
