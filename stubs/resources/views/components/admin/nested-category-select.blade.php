@pushonce('scripts')
    @vite('resources/js/admin/nested_category_select.js')
@endpushonce

@props([
    'categories' => []
])

<div>
    <div class="relative mt-2" tabindex="0">
        <input type="hidden" id="parent_id" name="parent_id">
        <button type="button" data-role="category_parent_toggler"
                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <span id="chosen_text" class="block truncate"> - </span>
            <span
                class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                     fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                          clip-rule="evenodd"/>
                </svg>
            </span>
        </button>
        <div
            class="hidden bg-white max-h-72 absolute z-10 mt-1 w-full overflow-auto rounded-md py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            tabindex="-1" id="container">
            <div data-role="category"
                 class="text-gray-900 relative cursor-default select-none py-1 overflow-auto relative">
                <div
                    class="w-full hover:bg-gradient-to-tl hover:from-adminify-main-color hover:to-adminify-secondary-color hover:text-white pl-1 py-1 rounded-sm">
                    <p data-category-id="{{ null }}" class="block font-normal block truncate">
                        -
                    </p>
                </div>
            </div>
            @foreach($categories as $category)
                <x-admin.category-child-chooser :category="$category"/>
            @endforeach
        </div>
    </div>
</div>
