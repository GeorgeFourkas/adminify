<x-layouts.admin>
    @pushonce('scripts')
        @vite(['resources/js/translate.js', 'resources/js/locale-editor/tabs.js'])
    @endpushonce

    <x-admin.session-flash />

    <form class="" action="{{ route('translations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="locale" value="{{ $locale }}">
        @php $iterator = 0; @endphp

        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="-mb-px flex flex-wrap justify-center text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                <li class="mr-2" id="web_text_toggler">
                    <a href="#" class="inline-flex items-center justify-center rounded-t-lg p-4 group"
                       aria-current="page">
                        <svg class="mr-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        Website Translations
                    </a>
                </li>

                <li class="mr-2" id="admin_text_toggler">
                    <a href="#"
                       class="inline-flex items-center justify-center rounded-t-lg border-b-2 border-transparent p-4 group hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="mr-2 h-4 w-4 group-hover:text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                        </svg>
                        Administration Translations
                    </a>
                </li>

                <li class="mr-2" id="system_text_toggler">
                    <a href="#"
                       class="inline-flex items-center justify-center rounded-t-lg border-b-2 border-transparent p-4 group hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="mr-2 h-4 w-4 group-hover:text-gray-500" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z"/>
                        </svg>
                        System Translations
                    </a>
                </li>
            </ul>
        </div>

        <div class="relative grid grid-cols-1 gap-4 py-10 lg:ml-20 lg:grid-cols-2" id="website_texts">
            @foreach($sentences as $original => $toTranslate)
                @php $isTranslated = $original !== $toTranslate; @endphp
                <div class="mx-auto w-11/12">
                    <label class="mb-2 flex items-center justify-start text-sm font-medium text-gray-900 space-x-4">
                        <p>Original Text</p>
                        <img src="{{ asset("vendor/blade-flags/language-en.svg") }}" class="h-6 w-6" alt="">
                    </label>
                    <textarea
                        readonly rows="4" name="json_translations[{{$iterator}}][original_text]"
                        class="resize-none  block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 {{ $isTranslated ? 'bg-lime-100' : '' }}"
                        placeholder="">{{ $original }}</textarea>
                </div>
                <div class="mx-auto flex w-11/12 items-center justify-center">
                    <div class="w-full">
                        <label
                            class="mb-2 flex items-center justify-start text-sm font-medium text-gray-900 lg:space-x-4">
                            <p>Translated Text</p>
                            @if(request()->has('translating'))
                                @php $locale = request()->input('translating') @endphp
                                <img src="{{ asset("vendor/blade-flags/language-$locale.svg") }}" class="h-5 w-5"
                                     alt="">
                            @endif
                            @if($isTranslated)
                                <x-icons.check class="text-lime-500"></x-icons.check>
                            @endif
                        </label>
                        <textarea
                            id=""
                            rows="4"
                            name="json_translations[{{$iterator}}][translation]"
                            class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 {{ $isTranslated ? 'bg-lime-100' : '' }}"
                            placeholder="">{{ $toTranslate }}</textarea>
                    </div>
                </div>
                @php $iterator++; @endphp
            @endforeach
        </div>


        <div class="relative grid grid-cols-1 gap-4 py-10 lg:ml-20 lg:grid-cols-2" id="admin_texts">
            @foreach($phpTranslations as $phpTranslation)
                @if($phpTranslation['file'] == 'adminify.php')
                    @foreach($phpTranslation['content'] as $key => $item)
                        <x-admin.translation-row
                            :content="$item"
                            :original=" $phpTranslation['original'][$key] ?? '' "
                            parentKey="{{ str_replace('.php', '', $phpTranslation['file']) }}][{{$key}}]"
                        />
                    @endforeach
                @endif
            @endforeach
        </div>


        <div class="relative grid grid-cols-1 gap-4 py-10 lg:ml-20 lg:grid-cols-2" id="system_texts">
            @foreach($phpTranslations as $phpTranslation)
                @if($phpTranslation['file'] !== 'adminify.php')
                    @foreach($phpTranslation['content'] as $key => $item)
                        <x-admin.translation-row
                            :content="$item"
                            :original=" $phpTranslation['original'][$key] ?? '' "
                            parentKey="{{ str_replace('.php', '', $phpTranslation['file']) }}][{{$key}}]"
                        />
                    @endforeach
                @endif
            @endforeach
        </div>

        <input type="submit" value="Save"
               class="fixed bottom-1 left-1/2 mt-5 translate-x-1/2 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
    </form>

</x-layouts.admin>
