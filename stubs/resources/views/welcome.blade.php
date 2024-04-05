<x-main-layout>
    <section id="home" class="bg-white dark:bg-gray-900">
        <div class="mx-auto grid max-w-screen-xl px-4 pt-20 pb-8 lg:grid-cols-12 lg:gap-8 lg:py-16 lg:pt-28 xl:gap-0">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="mb-4 max-w-2xl text-4xl font-extrabold leading-none tracking-tight dark:text-white md:text-5xl xl:text-6xl">
                    {{ __('Building Websites &') }}
                    <br>
                    {{ __('apps easier') }}
                </h1>
                <p class="mb-6 max-w-2xl font-light text-gray-500 dark:text-gray-400 md:text-lg lg:mb-8 lg:text-xl">
                    {{ __('This free and open-source package template was built using the utility classes from') }}
                    <a href="https://tailwindcss.com" class="hover:underline">
                        {{ __('Tailwind CSS') }}
                    </a>
                    {{ __('and based on the components from the') }}
                    <a href="https://flowbite.com/docs/getting-started/introduction/" class="hover:underline">
                        {{ __('Flowbite Library') }}
                    </a>
                    {{ __('and the') }}
                    <a href="https://flowbite.com/blocks/" class="hover:underline">
                        {{ __('Laravel Framework') }}
                    </a>.
                </p>
                <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex">
                    <a href="https://github.com/themesberg/landwind"
                       class="inline-flex w-full items-center justify-center rounded-lg border border-gray-200 px-5 py-3 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:text-white sm:w-auto dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <svg class="mr-2 h-4 w-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 496 512">
                            <path
                                    d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/>
                        </svg>
                        {{ __('View on GitHub') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                <img src="{{ Vite::asset('resources/images/hero.png') }}" alt="hero image">
            </div>
        </div>
    </section>
    <section id="tools" class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 pb-8 lg:pb-16">
            <div
                    class="grid grid-cols-2 gap-8 text-gray-500 dark:text-gray-400 sm:grid-cols-3 sm:gap-12 lg:grid-cols-6 select-none">
                <a target="_blank" href="https://laravel.com"
                   class="flex items-center lg:justify-center hover:text-gray-900 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 hover:text-gray-900" viewBox="0 0 50 52">
                        <script xmlns=""/>
                        <path
                                d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z"
                                fill="currentColor" fill-rule="evenodd"/>
                        <script xmlns=""/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 hover:text-gray-900 ml-1" viewBox="0 0 114 29">
                        <script xmlns=""/>
                        <path
                                d="M4.773.917v23.046h8.338v3.976H.333V.917h4.44zm24.01 11.465V9.95h4.208v17.99h-4.207v-2.433c-.567.901-1.37 1.609-2.413 2.123-1.042.515-2.091.772-3.146.772-1.365 0-2.613-.25-3.745-.752a8.758 8.758 0 0 1-2.915-2.066 9.6 9.6 0 0 1-1.89-3.01 9.717 9.717 0 0 1-.677-3.63c0-1.26.225-2.464.676-3.61a9.56 9.56 0 0 1 1.891-3.03 8.766 8.766 0 0 1 2.915-2.065c1.132-.502 2.38-.752 3.745-.752 1.055 0 2.104.257 3.146.772 1.042.515 1.846 1.222 2.413 2.123zm-.386 8.763a6.293 6.293 0 0 0 .387-2.2c0-.773-.13-1.506-.387-2.2a5.58 5.58 0 0 0-1.08-1.815 5.233 5.233 0 0 0-1.68-1.236c-.656-.308-1.383-.463-2.18-.463-.799 0-1.52.155-2.163.463a5.29 5.29 0 0 0-1.66 1.236 5.307 5.307 0 0 0-1.06 1.814 6.56 6.56 0 0 0-.368 2.2c0 .772.122 1.506.367 2.2.244.696.598 1.3 1.062 1.815a5.279 5.279 0 0 0 1.66 1.236c.642.309 1.363.463 2.161.463s1.525-.154 2.181-.463a5.222 5.222 0 0 0 1.68-1.236 5.575 5.575 0 0 0 1.08-1.814zm7.914 6.794V9.95h11.427v4.141h-7.22v13.85h-4.207zm26.675-15.557V9.95h4.208v17.99h-4.208v-2.433c-.566.901-1.37 1.609-2.413 2.123-1.042.515-2.09.772-3.146.772-1.364 0-2.612-.25-3.744-.752a8.758 8.758 0 0 1-2.915-2.066 9.6 9.6 0 0 1-1.891-3.01 9.717 9.717 0 0 1-.676-3.63c0-1.26.225-2.464.676-3.61a9.56 9.56 0 0 1 1.89-3.03 8.766 8.766 0 0 1 2.916-2.065c1.132-.502 2.38-.752 3.744-.752 1.055 0 2.104.257 3.146.772 1.043.515 1.847 1.222 2.413 2.123zm-.386 8.763a6.293 6.293 0 0 0 .386-2.2c0-.773-.13-1.506-.386-2.2a5.58 5.58 0 0 0-1.08-1.815 5.233 5.233 0 0 0-1.68-1.236c-.656-.308-1.384-.463-2.181-.463-.798 0-1.519.155-2.162.463a5.29 5.29 0 0 0-1.66 1.236 5.307 5.307 0 0 0-1.061 1.814 6.56 6.56 0 0 0-.367 2.2c0 .772.121 1.506.367 2.2.244.696.598 1.3 1.061 1.815a5.279 5.279 0 0 0 1.66 1.236c.643.309 1.364.463 2.162.463.797 0 1.525-.154 2.181-.463a5.222 5.222 0 0 0 1.68-1.236 5.575 5.575 0 0 0 1.08-1.814zM84.063 9.95h4.262L81.42 27.94H76.13L69.224 9.95h4.262l5.289 13.776L84.063 9.95zm13.44-.463c5.729 0 9.636 5.078 8.902 11.021H92.446c0 1.552 1.567 4.552 5.288 4.552 3.2 0 5.345-2.815 5.346-2.817l2.843 2.2c-2.542 2.713-4.623 3.96-7.882 3.96-5.823 0-9.77-3.684-9.77-9.458 0-5.223 4.079-9.458 9.231-9.458zm-5.046 7.894h10.084c-.031-.346-.578-4.552-5.072-4.552-4.495 0-4.98 4.206-5.012 4.552zm16.688 10.558V.917h4.208v27.022h-4.208z"
                                fill="currentColor" fill-rule="evenodd"/>
                        <script xmlns=""/>
                    </svg>
                </a>
                <a target="_blank" href="https://tailwindcss.com" class="flex items-center lg:justify-center">
                    <svg viewBox="0 0 248 31" class="h-9 hover:text-gray-900">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M25.517 0C18.712 0 14.46 3.382 12.758 10.146c2.552-3.382 5.529-4.65 8.931-3.805 1.941.482 3.329 1.882 4.864 3.432 2.502 2.524 5.398 5.445 11.722 5.445 6.804 0 11.057-3.382 12.758-10.145-2.551 3.382-5.528 4.65-8.93 3.804-1.942-.482-3.33-1.882-4.865-3.431C34.736 2.92 31.841 0 25.517 0zM12.758 15.218C5.954 15.218 1.701 18.6 0 25.364c2.552-3.382 5.529-4.65 8.93-3.805 1.942.482 3.33 1.882 4.865 3.432 2.502 2.524 5.397 5.445 11.722 5.445 6.804 0 11.057-3.381 12.758-10.145-2.552 3.382-5.529 4.65-8.931 3.805-1.941-.483-3.329-1.883-4.864-3.432-2.502-2.524-5.398-5.446-11.722-5.446z"
                              fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M76.546 12.825h-4.453v8.567c0 2.285 1.508 2.249 4.453 2.106v3.463c-5.962.714-8.332-.928-8.332-5.569v-8.567H64.91V9.112h3.304V4.318l3.879-1.143v5.937h4.453v3.713zM93.52 9.112h3.878v17.849h-3.878v-2.57c-1.365 1.891-3.484 3.034-6.285 3.034-4.884 0-8.942-4.105-8.942-9.389 0-5.318 4.058-9.388 8.942-9.388 2.801 0 4.92 1.142 6.285 2.999V9.112zm-5.674 14.636c3.232 0 5.674-2.392 5.674-5.712s-2.442-5.711-5.674-5.711-5.674 2.392-5.674 5.711c0 3.32 2.442 5.712 5.674 5.712zm16.016-17.313c-1.364 0-2.477-1.142-2.477-2.463a2.475 2.475 0 012.477-2.463 2.475 2.475 0 012.478 2.463c0 1.32-1.113 2.463-2.478 2.463zm-1.939 20.526V9.112h3.879v17.849h-3.879zm8.368 0V.9h3.878v26.06h-3.878zm29.053-17.849h4.094l-5.638 17.849h-3.807l-3.735-12.03-3.771 12.03h-3.806l-5.639-17.849h4.094l3.484 12.315 3.771-12.315h3.699l3.734 12.315 3.52-12.315zm8.906-2.677c-1.365 0-2.478-1.142-2.478-2.463a2.475 2.475 0 012.478-2.463 2.475 2.475 0 012.478 2.463c0 1.32-1.113 2.463-2.478 2.463zm-1.939 20.526V9.112h3.878v17.849h-3.878zm17.812-18.313c4.022 0 6.895 2.713 6.895 7.354V26.96h-3.878V16.394c0-2.713-1.58-4.14-4.022-4.14-2.55 0-4.561 1.499-4.561 5.14v9.567h-3.879V9.112h3.879v2.285c1.185-1.856 3.124-2.749 5.566-2.749zm25.282-6.675h3.879V26.96h-3.879v-2.57c-1.364 1.892-3.483 3.034-6.284 3.034-4.884 0-8.942-4.105-8.942-9.389 0-5.318 4.058-9.388 8.942-9.388 2.801 0 4.92 1.142 6.284 2.999V1.973zm-5.674 21.775c3.232 0 5.674-2.392 5.674-5.712s-2.442-5.711-5.674-5.711-5.674 2.392-5.674 5.711c0 3.32 2.442 5.712 5.674 5.712zm22.553 3.677c-5.423 0-9.481-4.105-9.481-9.389 0-5.318 4.058-9.388 9.481-9.388 3.519 0 6.572 1.82 8.008 4.605l-3.34 1.928c-.79-1.678-2.549-2.749-4.704-2.749-3.16 0-5.566 2.392-5.566 5.604 0 3.213 2.406 5.605 5.566 5.605 2.155 0 3.914-1.107 4.776-2.749l3.34 1.892c-1.508 2.82-4.561 4.64-8.08 4.64zm14.472-13.387c0 3.249 9.661 1.285 9.661 7.89 0 3.57-3.125 5.497-7.003 5.497-3.591 0-6.177-1.607-7.326-4.177l3.34-1.927c.574 1.606 2.011 2.57 3.986 2.57 1.724 0 3.052-.571 3.052-2 0-3.176-9.66-1.391-9.66-7.781 0-3.356 2.909-5.462 6.572-5.462 2.945 0 5.387 1.357 6.644 3.713l-3.268 1.82c-.647-1.392-1.904-2.035-3.376-2.035-1.401 0-2.622.607-2.622 1.892zm16.556 0c0 3.249 9.66 1.285 9.66 7.89 0 3.57-3.124 5.497-7.003 5.497-3.591 0-6.176-1.607-7.326-4.177l3.34-1.927c.575 1.606 2.011 2.57 3.986 2.57 1.724 0 3.053-.571 3.053-2 0-3.176-9.66-1.391-9.66-7.781 0-3.356 2.908-5.462 6.572-5.462 2.944 0 5.386 1.357 6.643 3.713l-3.268 1.82c-.646-1.392-1.903-2.035-3.375-2.035-1.401 0-2.622.607-2.622 1.892z"
                              fill="currentColor"></path>
                    </svg>
                </a>
                <a target="_blank" href="https://spatie.be/" class="flex items-center lg:justify-center">
                    <svg class="h-9 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 255.12">
                        <g>
                            <path class="fill-current text-blue"
                                  d="M0,9.77A10,10,0,0,1,10.26,0H585a10,10,0,0,1,10.28,9.77V245.36A10,10,0,0,1,585,255.12H10.26A10,10,0,0,1,0,245.36V9.77Z"></path>
                        </g>
                        <g>
                            <path
                                    d="M95.6,156.66l10.87-14.84c6.46,5.32,13.82,8.95,21.52,8.95,5.44,0,8.27-2.38,8.27-5.78v-0.11c0-3.17-2.38-5.1-11.67-8.38-14.95-5.1-25.48-10.53-25.48-24.92v-0.34c0-14.38,11-24.46,28.31-24.46,10.65,0,20,2.94,28.31,9.63l-10.31,15.17c-5.44-4.19-12-7.25-18.46-7.25-4.64,0-7.25,2.27-7.25,5.21v0.11c0,3.51,2.49,5.32,12.57,9.06,15.06,4.87,24.46,11,24.46,24.46v0.23c0,15.4-11.89,24.92-28.88,24.92A48.26,48.26,0,0,1,95.6,156.66Z"
                                    class="fill-current text-white"></path>
                            <path
                                    d="M175.67,87.92H204c18.69,0,30.92,9.74,30.92,27.52v0.45c0,19-13.82,28.09-31.14,28.31h-7.81v23H175.67V87.92Zm27.41,39.64c7.13,0,11.44-4.19,11.44-10.87v-0.34c0-7.25-4.19-11-11.55-11h-7v22.2h7.13Z"
                                    class="fill-current text-white"></path>
                            <path
                                    d="M267.17,87.47h20.61l28,79.73h-21.4l-4.64-14.27H264.8l-4.53,14.27h-21Zm17.44,49.15-7.36-23.22-7.36,23.22h14.72Z"
                                    class="fill-current text-white"></path>
                            <path d="M338.64,106.27H319V87.92h59.57v18.35H359V167.2H338.64V106.27Z"
                                  class="fill-current text-white"></path>
                            <path d="M396.17,87.92h20.39V167.2H396.17V87.92Z" class="fill-current text-white"></path>
                            <path d="M444.64,87.92h54.59v17.89H464.8v13h31v16.88h-31V149.3h34.88V167.2h-55V87.92Z"
                                  class="fill-current text-white"></path>
                        </g>
                    </svg>
                </a>
                <a target="_blank" href="https://www.creative-tim.com/" class="flex items-center lg:justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 hover:text-gray-900" id="Layer_3"
                         data-name="Layer 3"
                         viewBox="0 0 222.35 70.98">
                        <script xmlns=""/>
                        <path class="cls-1"
                              d="M712.56,790.47H648.82a3.62,3.62,0,0,0-3.62,3.62v30.35a3.62,3.62,0,0,0,3.62,3.62H661.9v29.77a3.62,3.62,0,0,0,3.62,3.62h30.35a3.61,3.61,0,0,0,3.61-3.62V828.06h13.08a3.62,3.62,0,0,0,3.62-3.62V794.09A3.62,3.62,0,0,0,712.56,790.47Zm-63.16,4.2h29.19v29.19H649.4Zm45.89,62.58h-29.2V828.06h29.2ZM712,823.86H682.79V794.67H712Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M669.21,814.1a2.1,2.1,0,0,0,1.49.61,2.07,2.07,0,0,0,1.48-.61,2.1,2.1,0,0,0,0-3l-6.7-6.7a2.1,2.1,0,0,0-3,0l-6.7,6.7a2.1,2.1,0,0,0,3,3l5.22-5.22Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M692.17,814.1l5.22-5.22,5.22,5.22a2.1,2.1,0,0,0,3,0,2.1,2.1,0,0,0,0-3l-6.7-6.7a2.1,2.1,0,0,0-3,0l-6.7,6.7a2.1,2.1,0,1,0,3,3Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M675.47,837.82a2.1,2.1,0,0,0-3,3l6.71,6.7a2.09,2.09,0,0,0,3,0l6.7-6.7a2.1,2.1,0,0,0-3-3L680.69,843Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M735.2,818.47a11.15,11.15,0,0,1-4.37-4.19,12.23,12.23,0,0,1,0-12.08,11.34,11.34,0,0,1,4.39-4.19,12.9,12.9,0,0,1,6.25-1.52,13.14,13.14,0,0,1,5.13,1,10.48,10.48,0,0,1,3.24,2.13.94.94,0,0,1,0,1.36l-1.39,1.31a1,1,0,0,1-1.29,0,7.92,7.92,0,0,0-5.47-2.06,8.61,8.61,0,0,0-4.21,1,7.48,7.48,0,0,0-2.91,2.86,8.76,8.76,0,0,0,0,8.28,7.48,7.48,0,0,0,2.91,2.86,8.5,8.5,0,0,0,4.21,1,7.91,7.91,0,0,0,5.47-2.08.94.94,0,0,1,1.29,0l1.4,1.33a1,1,0,0,1,0,1.36,10.46,10.46,0,0,1-3.26,2.13,13.22,13.22,0,0,1-5.14,1A12.88,12.88,0,0,1,735.2,818.47Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M764.29,803v1.86a1,1,0,0,1-.94,1h0a4.93,4.93,0,0,0-3.72,1.38,5.51,5.51,0,0,0-1.34,4v7.51a1,1,0,0,1-.95.94h-2.19a.94.94,0,0,1-.94-.94V803.18a.94.94,0,0,1,.94-.94h2a.94.94,0,0,1,.94.94v1.6a6.35,6.35,0,0,1,5.2-2.7A.94.94,0,0,1,764.29,803Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M783.41,812.25H770.62a4.74,4.74,0,0,0,1.88,3.06,6.13,6.13,0,0,0,3.77,1.12,6.49,6.49,0,0,0,4.08-1.31.94.94,0,0,1,1.28.14l1,1.14a.94.94,0,0,1,0,1.3,7.48,7.48,0,0,1-2.36,1.47,11.75,11.75,0,0,1-9.1-.42,8.24,8.24,0,0,1-3.38-3.18,9,9,0,0,1-1.19-4.62,9.15,9.15,0,0,1,1.16-4.59,8.18,8.18,0,0,1,3.21-3.18,9.41,9.41,0,0,1,4.64-1.14,9.17,9.17,0,0,1,4.55,1.13,7.93,7.93,0,0,1,3.13,3.16,9.61,9.61,0,0,1,1.13,4.72c0,.08,0,.18,0,.29A.94.94,0,0,1,783.41,812.25Zm-11.18-5.79a4.84,4.84,0,0,0-1.64,3.09h9.88a4.77,4.77,0,0,0-1.59-3.07,4.86,4.86,0,0,0-3.33-1.18A5,5,0,0,0,772.23,806.46Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M800.72,803.88q2,1.85,2,5.57v9.27a.94.94,0,0,1-1,.94h-2a.94.94,0,0,1-.94-.94v-1.18a4.79,4.79,0,0,1-2.14,1.75,8.38,8.38,0,0,1-3.34.6,8.14,8.14,0,0,1-3.43-.67,5.19,5.19,0,0,1-2.27-1.86,4.73,4.73,0,0,1-.8-2.69,4.6,4.6,0,0,1,1.75-3.77c1.16-.95,3-1.42,5.5-1.42h4.5v-.26a3.58,3.58,0,0,0-1.09-2.81,4.75,4.75,0,0,0-3.25-1,9.54,9.54,0,0,0-2.89.46,7.87,7.87,0,0,0-1.58.7,1,1,0,0,1-1.32-.36l-.69-1.28a.93.93,0,0,1,.33-1.25,10.47,10.47,0,0,1,2.56-1.11,14.63,14.63,0,0,1,4.08-.55A8.49,8.49,0,0,1,800.72,803.88ZM797,816.22a3.87,3.87,0,0,0,1.68-2v-2h-4.21c-2.35,0-3.52.77-3.52,2.32a2.07,2.07,0,0,0,.88,1.76,4.06,4.06,0,0,0,2.45.65A5.22,5.22,0,0,0,797,816.22Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M818.56,818a.93.93,0,0,1-.42,1.18,5.13,5.13,0,0,1-1,.42,8.12,8.12,0,0,1-2.17.29,6.15,6.15,0,0,1-4.44-1.5,5.79,5.79,0,0,1-1.57-4.37v-8.39H807a1,1,0,0,1-1-1v-1.37a1,1,0,0,1,1-.94h1.92v-3a1,1,0,0,1,1-1h2.19a1,1,0,0,1,.94,1v3h3.72a.94.94,0,0,1,.95.94v1.37a.94.94,0,0,1-.95,1H813v8.29a2.77,2.77,0,0,0,.62,1.94,2.32,2.32,0,0,0,1.8.67,4.1,4.1,0,0,0,1.48-.26.94.94,0,0,1,1.2.54Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M823.54,802.24h2.19a.94.94,0,0,1,.94.94v15.54a.94.94,0,0,1-.94.94h-2.19a1,1,0,0,1-.95-.94V803.18A1,1,0,0,1,823.54,802.24Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M848.16,803.55l-6.66,15.54a.94.94,0,0,1-.87.57h-3a.94.94,0,0,1-.87-.57l-6.66-15.54a.94.94,0,0,1,.87-1.31h2.18a.93.93,0,0,1,.87.58l5.17,12.34,5.34-12.35a.94.94,0,0,1,.86-.57h1.86A.94.94,0,0,1,848.16,803.55Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M866.6,812.25H853.82a4.77,4.77,0,0,0,1.87,3.06,6.15,6.15,0,0,0,3.77,1.12,6.5,6.5,0,0,0,4.09-1.31.93.93,0,0,1,1.27.14l1,1.14a1,1,0,0,1-.05,1.3,7.59,7.59,0,0,1-2.36,1.47,11.75,11.75,0,0,1-9.1-.42,8.18,8.18,0,0,1-3.38-3.18,8.93,8.93,0,0,1-1.19-4.62,9.05,9.05,0,0,1,1.16-4.59,8.18,8.18,0,0,1,3.21-3.18,9.37,9.37,0,0,1,4.63-1.14,9.18,9.18,0,0,1,4.56,1.13,8,8,0,0,1,3.13,3.16,9.6,9.6,0,0,1,1.12,4.72v.29A1,1,0,0,1,866.6,812.25Zm-11.17-5.79a4.9,4.9,0,0,0-1.65,3.09h9.89a4.78,4.78,0,0,0-1.6-3.07,4.83,4.83,0,0,0-3.33-1.18A4.93,4.93,0,0,0,855.43,806.46Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M738.32,835.85H731.7a.94.94,0,0,1-1-.94v-1.7a1,1,0,0,1,1-1h17.49a1,1,0,0,1,.94,1v1.7a.94.94,0,0,1-.94.94h-6.63v18.31a1,1,0,0,1-.94,1h-2.35a1,1,0,0,1-.95-1Z"
                              transform="translate(-645.2 -790.47)"/>
                        <path class="cls-1"
                              d="M791.51,839.39q1.92,1.92,1.92,5.73v9a1,1,0,0,1-.94,1H790.3a1,1,0,0,1-.95-1v-8.52a5.07,5.07,0,0,0-1-3.44,3.64,3.64,0,0,0-2.9-1.16,4.25,4.25,0,0,0-3.3,1.36,5.54,5.54,0,0,0-1.24,3.86v7.9a1,1,0,0,1-.94,1h-2.19a1,1,0,0,1-.95-1v-8.52a5.07,5.07,0,0,0-1-3.44,3.64,3.64,0,0,0-2.9-1.16,4.29,4.29,0,0,0-3.32,1.34,5.59,5.59,0,0,0-1.22,3.88v7.9a1,1,0,0,1-.94,1h-2.19a1,1,0,0,1-1-1V838.63a1,1,0,0,1,1-1h2a1,1,0,0,1,.95,1v1.27a6.28,6.28,0,0,1,2.44-1.79,8.22,8.22,0,0,1,3.27-.62,7.86,7.86,0,0,1,3.47.73,5.65,5.65,0,0,1,2.4,2.17,7.3,7.3,0,0,1,2.77-2.14,9.06,9.06,0,0,1,3.76-.76A7.11,7.11,0,0,1,791.51,839.39Z"
                              transform="translate(-645.2 -790.47)"/>
                        <rect class="cls-1" x="177.39" y="4.18" width="4.08" height="4.08" rx="2.04"/>
                        <path class="cls-1"
                              d="M755.15,837.74h2.19a1,1,0,0,1,.95.94v15.54a1,1,0,0,1-.95.94h-2.19a.94.94,0,0,1-.94-.94V838.68A.94.94,0,0,1,755.15,837.74Z"
                              transform="translate(-645.2 -790.47)"/>
                        <rect class="cls-1" x="109.01" y="39.68" width="4.08" height="4.08" rx="2.04"/>
                        <script xmlns=""/>
                    </svg>
                </a>
                <a target="_blank" href="https://www.chartjs.org/" class="flex items-center lg:justify-center">
                    <svg class="h-11 hover:text-gray-900 dark:hover:text-white grayscale"
                         xmlns="http://www.w3.org/2000/svg" version="1.1"
                         id="Layer_1" x="0px" y="0px" viewBox="0 0 192 192" enable-background="new 0 0 192 192"
                         xml:space="preserve">
                        <script xmlns=""/>
                        <path fill="currentColor"
                              d="M161.271,96.556c-22.368,0.439-17.709,14.599-33.473,18.18c-16.014,3.638-18.542-39.111-34.552-39.111  c-16.012,0-19.559,41.526-39.608,70.034l-0.572,0.807l42.985,24.813l65.22-37.651V96.556z"/>
                        <path fill="currentColor"
                              d="M161.271,95.267c-7.488-9.61-12.567-20.658-23.494-20.658c-19.337,0-14.249,31.545-35.62,31.545  c-21.373,0-23.62-33.931-47.832-2.035c-7.715,10.163-13.925,21.495-18.803,32.218l60.529,34.943l65.22-37.651V95.267z"/>
                        <path opacity="0.8" fill="currentColor"
                              d="M30.829,108.334c7.338-20.321,10.505-36.779,24.514-36.779  c21.371,0,26.458,60.039,44.779,53.931c18.318-6.105,16.282-38.669,44.779-38.669c5.424,0,10.962,3.323,16.371,8.698v38.113  l-65.22,37.651l-65.222-37.651V108.334z"/>
                        <path fill="currentColor"
                              d="M96,176l-69.292-39.999V56L96,16l69.292,40v80L96,176z M34.849,131.301L96,166.602l61.151-35.301V60.7  L96,25.399L34.849,60.7V131.301z"/>
                        <script xmlns=""/>
                    </svg>
                    <span class="font-semibold">Chart.js</span>
                </a>
                <a target="_blank" href="https://flowbite.com/" class="flex items-center lg:justify-center group">
                    <svg class="h-9 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="m16 12-5.7-2.8h-.1v6.5l2.4-2.9 3.3-.8Z"/>
                        <path
                                d="M11.5 4 17 7.5a4 4 0 0 1 2 3.8 3 3 0 0 1-2.4 2.6h-.2l-2.8.7-2 2.5a2 2 0 0 1-.6.5l.1.1a2 2 0 0 0 2 0c.6-.3 2.2-1.1 4.7-2.8l.2-.2c1.4-1 3.6-2.5 4-4.2A10 10 0 0 0 12.6 2c-1.6 0-3 .2-4.5.8 1.2.3 2.3.7 3.4 1.3Z"/>
                        <path
                                d="M5.4 17v-6.4a3.7 3.7 0 0 1 1.7-3 4 4 0 0 1 3.4-.3l.5.1 5.8 2.9.2.2A2.1 2.1 0 0 0 16 9l-5.5-3.3c-1.7-.8-3.9-1.5-5.2-1a10 10 0 0 0 .5 15.1c-.2-.9-.4-1.8-.4-2.7Z"/>
                        <path
                                d="m19.1 16.2-.3.1a60.4 60.4 0 0 1-4.7 3 4 4 0 0 1-4 0A3.8 3.8 0 0 1 8.3 16V9H8a1.8 1.8 0 0 0-.8 1.6V17c0 1.5.4 3 1.1 4.3A10.1 10.1 0 0 0 22 14c-.8.9-1.8 1.6-2.8 2.3Z"/>
                    </svg>
                    <span class="font-semibold group-hover:text-gray-900">
                        Flowbite
                    </span>
                </a>
            </div>
        </div>
    </section>
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 py-8 space-y-12 lg:space-y-20 lg:px-6 lg:py-24">
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 dark:text-gray-400 sm:text-lg">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                        {{ __('Work with tools you already use') }}
                    </h2>
                    <p class="mb-8 font-light lg:text-md">
                        {{ __('Adminify is an open source package that revolutionizes the way you build & manage your Laravel website. With a focus on simplicity and efficiency, Adminify empowers you to effortlessly scaffold a website tailored to your needs.') }}
                    </p>
                    <ul role="list" class="my-7 border-t border-gray-200 pt-8 space-y-5 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Full Control Over Components') }}
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Integrated Analytics Charts') }}
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('One-Command Installation process') }}
                            </span>
                        </li>
                    </ul>
                </div>
                <img class="mb-4 hidden w-full rounded-lg lg:mb-0 lg:flex"
                     src="{{ Vite::asset('resources/images/feature-1.png') }}" alt="dashboard feature image">
            </div>
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <img class="mb-4 hidden w-full rounded-lg lg:mb-0 lg:flex"
                     src="{{ Vite::asset('resources/images/feature-2.png') }}" alt="feature image 2">
                <div class="text-gray-500 dark:text-gray-400 sm:text-lg">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                        {{ __('Unlock the Power of Data Visualization') }}
                    </h2>
                    <p class="mb-8 font-light lg:text-md">
                        {{ __('integrated seamlessly with Google Analytics, offering you a powerful way to visualize and comprehend your website\'s data through dynamic, interactive charts.') }}
                    </p>
                    <ul role="list" class="my-7 border-t border-gray-200 pt-8 space-y-5 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Real-time online users count') }}


                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Website\'s Traffic Line Chart') }}
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Doughnut Device Chart') }}
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Visitor Sources Charts') }}
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-purple-500 dark:text-purple-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                {{ __('Users\' Countries Map Chart') }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="features" class="bg-white dark:bg-gray-900">
        <div
                class="mx-auto max-w-screen-xl items-center px-4 py-8 lg:grid lg:grid-cols-4 lg:gap-16 lg:px-6 lg:py-24 xl:gap-24">
            <div class="col-span-2 mb-8">
                <p class="text-lg font-medium text-purple-600 dark:text-purple-500">{{ __('Batteries Included') }}</p>
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white md:text-3xl">
                    {{ __('The perfect starting point for the next website!') }}
                </h2>
                <p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">
                    {{ __('Adminify offers a seamlessly integrated administration panel, user-friendly post management, reactive and multilingual categories & tags management as well as users\' management support.') }}
                </p>
                <div class="mt-6 border-t border-gray-200 pt-6 space-y-4 dark:border-gray-700">
                    <div>
                        <a href="#"
                           class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
                            {{ __('Explore Legality Guide') }}
                            <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <a href="#"
                           class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
                            {{ __('Visit the Trust Center') }}
                            <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-2 space-y-8 md:space-y-0 md:grid md:grid-cols-2 md:gap-12">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="mb-2 h-10 w-10 text-purple-600 dark:text-purple-500 md:h-12 md:w-12">
                        <path
                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z"/>
                        <path
                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z"/>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">
                        {{ __('Post Management') }}
                    </h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">
                        {{ __('Manage Posts with multilingual support for the website\'s blog') }}
                    </p>
                </div>
                <div>
                    <svg class="mb-2 h-10 w-10 text-purple-600 dark:text-purple-500 md:h-12 md:w-12" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">
                        {{ __('Users') }}
                    </h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">
                        {{ __('Users\' management support with roles & permissions') }}
                    </p>
                </div>
                <div>
                    <svg class="mb-2 h-10 w-10 text-purple-600 dark:text-purple-500 md:h-12 md:w-12" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">
                        {{ __('Taxonomies') }}
                    </h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">
                        {{ __('Create categories and tags and categorize all your content') }}
                    </p>
                </div>
                <div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="mb-2 h-10 w-10 text-purple-600 dark:text-purple-500 md:h-12 md:w-12">
                        <path fill-rule="evenodd"
                              d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                              clip-rule="evenodd"/>
                        <path
                                d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z"/>
                        <path fill-rule="evenodd"
                              d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">
                        {{ __('Settings') }}
                    </h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">
                        {{ __('Blog pages & functionality included for rapid development') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 py-8 text-center lg:px-6 lg:py-24">
            <figure class="mx-auto max-w-screen-md">
                <svg class="mx-auto mb-3 h-12 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                            fill="currentColor"/>
                </svg>
                <blockquote>
                    <p class="text-xl font-medium text-gray-900 dark:text-white md:text-2xl">"
                        {{ __('Adminify is just awesome. It contains tons of predesigned components and pages starting from login screen to blog to complex dashboard. Perfect choice for your next website.') }}
                        "
                    </p>
                </blockquote>
                <figcaption class="mt-6 flex items-center justify-center space-x-3">
                    <img class="h-6 w-6 rounded-full"
                         src="{{ Vite::asset('resources/images/ceo.jpg') }}"
                         alt="profile picture">
                    <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                        <div class="pr-3 font-medium text-gray-900 dark:text-white">George Fourkas</div>
                        <div class="pl-3 text-sm font-light">
                            {{ __('CEO at') }}
                            <a class="text-orange-600 underline underline-offset-2" target="_blank"
                               href="https://nalcom.gr">
                                Nalcom
                            </a>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
    <section id="faq" class="bg-white dark:bg-gray-900 mt-20">
        <div class="mx-auto max-w-screen-xl px-4 pb-8 lg:px-6 lg:pb-24">
            <h2 class="mb-6 text-center text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:mb-8 lg:text-3xl">
                {{ __('Frequently asked questions') }}
            </h2>
            <div class="mx-auto max-w-screen-md">
                <div id="accordion-flush" data-accordion="collapse"
                     data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                     data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h3 id="accordion-flush-heading-1">
                        <button type="button"
                                class="flex w-full items-center justify-between border-b border-gray-200 bg-white py-5 text-left font-medium text-gray-900 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                                aria-controls="accordion-flush-body-1">
                            <span>W{{ __('hat is OpenPanel?') }}</span>
                            <svg data-accordion-icon="" class="h-6 w-6 shrink-0 rotate-180" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="border-b border-gray-200 py-5 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                {{ __('Adminify is an open-source software that provides an easy-to-use, customizable administration panel for websites, facilitating effortless management of posts, language settings, and integration with various tools, including Google Analytics.') }}
                            </p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-2">
                        <button type="button"
                                class="flex w-full items-center justify-between border-b border-gray-200 py-5 text-left font-medium text-gray-500 dark:border-gray-700 dark:text-gray-400"
                                data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                aria-controls="accordion-flush-body-2">
                            <span>{{ __('How does Adminify handle multilingual website management?') }}</span>
                            <svg data-accordion-icon="" class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="border-b border-gray-200 py-5 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                {{ __('OpenPanel features a comprehensive language management system that allows website administrators to easily add, modify, and switch between different languages, making the website accessible to a global audience.') }}
                            </p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-3">
                        <button type="button"
                                class="flex w-full items-center justify-between border-b border-gray-200 py-5 text-left font-medium text-gray-500 dark:border-gray-700 dark:text-gray-400"
                                data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                aria-controls="accordion-flush-body-3">
                            <span>{{ __('Is Adminify suitable for beginners?') }}</span>
                            <svg data-accordion-icon="" class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="border-b border-gray-200 py-5 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                {{ __('Yes, Adminify is designed with a user-friendly interface that makes it accessible for beginners, while also offering advanced features for more experienced users to take full control of their website administration.') }}
                            </p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-4">
                        <button type="button"
                                class="flex w-full items-center justify-between border-b border-gray-200 py-5 text-left font-medium text-gray-500 dark:border-gray-700 dark:text-gray-400"
                                data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                                aria-controls="accordion-flush-body-4">
                            <span>{{ __('Is there any cost associated with using Adminify?') }}</span>
                            <svg data-accordion-icon="" class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="border-b border-gray-200 py-5 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                {{ __('No, Adminify is completely free to use. As an open-source solution, it is available for download and use without any licensing fees, making it a cost-effective option for managing your website\'s administration panel.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog" class="bg-white py-6">
        <div class="text-center my-10">
            <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                {{ __('From the blog') }}
            </h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg">
                {{ __('These are the latest articles, that were most likely seeded from the Installation Command') }}
            </p>
        </div>
        <div
                class="max-w-screen-xl flex flex-col lg:flex-row mx-auto items-center justify-between space-y-5 lg:space-y-0 lg:space-x-10 pb-5 mt-10">
            @foreach($posts as $post)
                <article class="lg:w-1/3 relative isolate flex flex-col gap-8 ">
                    <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:shrink-0">
                        <img src="{{ $post?->media->first()->url }}" alt=""
                             class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    </div>
                    <div>
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $post->created_at->format('d-m-Y') }}" class="text-gray-500">
                                {{ $post->created_at->translatedFormat('M d, Y') }}
                            </time>
                            @foreach($post?->categories as $category)
                                <a href="{{ route('blog', ['category' => $category->name]) }}"
                                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="group relative max-w-xl">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="{{ route('blog.single',  $post->slug) }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 text-sm leading-6 text-gray-600">
                                {{ str(strip_tags($post->body))->words(30) }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <section class="bg-gray-50 dark:bg-gray-800 mt-10">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                    {{ __('CAPTCHA Protected Contact Form') }}
                </h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg">
                    {{ __('Set the email SMTP credentials and test it out! Templates for contact emails are included') }}
                </p>
                <x-contact-form class="w-full px-10 space-y-5">
                    <div class="flex flex-col items-start">
                        <x-input-label :value="__('First Name')"/>
                        <x-text-input name="first_name" class="w-full"/>
                    </div>
                    <div class="flex flex-col items-start">
                        <x-input-label :value="__('Last name')"/>
                        <x-text-input name="last_name" class="w-full"/>
                    </div>
                    <div class="flex flex-col items-start">
                        <x-input-label :value="__('Email')"/>
                        <x-text-input name="email" class="w-full"/>
                    </div>
                    <div class="flex flex-col items-start">
                        <x-input-label :value="__('Phone')"/>
                        <x-text-input name="phone" class="w-full"/>
                    </div>
                    <div class="flex flex-col items-start">
                        <x-input-label :value="__('Message')"/>
                        <textarea name="message"
                            class="w-full resize-none text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:outline-none"
                            rows="6"></textarea>
                    </div>
                </x-contact-form>
            </div>
        </div>
    </section>
</x-main-layout>
