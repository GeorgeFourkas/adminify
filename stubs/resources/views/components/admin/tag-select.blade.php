@php use App\Models\Adminify\Tag; @endphp
@pushonce('scripts')
    @vite('resources/js/admin/tags-input.js')
@endpushonce
@props(['selected' => [], 'old' => []])
@php $selected = $old ? Tag::whereIn('id', $old)->get()->toArray() : $selected; @endphp
<div>
    <label for="combobox"
           class="block text-sm font-medium capitalize leading-6 text-gray-900">{{ __('adminify.tags.page_title') }}</label>
    <div class="relative mt-2">
        <input id="tag_input" type="text"
               class="w-full rounded-md border-0 bg-white pr-12 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
               role="combobox">
        <button type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
        <ul class="absolute z-10 mt-1 hidden max-h-60 w-full overflow-auto rounded-md bg-white py-2 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            id="tag-suggest">
        </ul>
    </div>
</div>
<div class="mt-2 flex w-full flex-wrap items-start justify-start" id="drawed-tags"></div>
<div class="hidden" id="selected_tags" selected_tags="{{ json_encode($selected) }}"></div>
