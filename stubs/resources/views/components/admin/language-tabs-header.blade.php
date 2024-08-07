@props( [
    'locales' => []
])
@pushonce('scripts')
    @vite('resources/js/admin/tabs.js')
@endpushonce
<ul class=" {{  count($locales) > 1 ? '' : 'hidden' }} rounded-lg text-center text-sm font-medium text-gray-500 flex flex-wrap items-center justify-center min-h-full xl:space-x-5"
    data-locales="{{  json_encode($locales) }}">
    @foreach($locales as $key => $locale)
        <x-admin.tab-header :tab-name="Locale::getDisplayLanguage($locale, app()->getLocale())" :id="$locale">
            <img src="{{ asset("vendor/blade-flags/language-$locale.svg") }}" class="mr-5 h-5 w-5"/>
        </x-admin.tab-header>
    @endforeach
</ul>
