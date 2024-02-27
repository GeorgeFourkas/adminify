<x-layouts.admin>
    @pushonce('scripts')
        @vite('resources/js/admin/category-crud.js')
    @endpushonce
    <x-admin.session-flash/>
    <div
        class="mx-auto flex w-full flex-none flex-col-reverse items-start justify-between px-3 space-y-4 lg:space-y-0 lg:space-x-6 lg:mx-0 lg:w-11/12 lg:flex-row">
        <div
            class="relative m-4 mb-6 flex w-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg lg:w-1/2">
            <div class="flex w-full items-start justify-between border-b border-slate-100 py-5">
                <div
                    class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 capitalize border-b-solid">
                    <h6>{{ __('adminify.categories.page_title') }}</h6>
                </div>
                <div class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                    <x-admin.primary-action-button
                        :text="__('adminify.categories.add_category_button')"
                        id="create_category"
                        as="button">
                        <x-icons.add/>
                    </x-admin.primary-action-button>
                </div>

            </div>
            <div class="mt-5 px-5 font-semibold">
                @foreach($categories->toTree() as $category)
                    <div class="">
                        <x-admin.category-child
                            parent-id=""
                            parent-name=""
                            :category="$category"
                            :border="false"
                            :last-sibling="false"
                        />
                    </div>
                @endforeach
            </div>
        </div>
        <div id="crud-panel"
             class="flex hidden w-full items-center justify-center rounded-lg bg-white px-5 py-7 shadow-soft-2xl lg:w-1/2">
            <div class="w-full">
                <x-admin.language-tabs-header :locales="$locales"/>
                <form id="categories_crud_form" action="{{ route('categories.store') }}" method="POST"
                      data-save="{{ route('categories.store') }}" data-update="{{ route('categories') }}">
                    @csrf
                    <div class="w-full">
                        <div class="flex w-full flex-col items-start justify-start lg:space-x-1 lg:flex-row">
                            <div class="mt-5 w-full lg:mt-0 lg:w-6/12">
                                @foreach($locales as $key => $locale)
                                    <div class="mt-10 hidden w-full rounded-lg" id="tab_{{ $locale }}">
                                        <div class="w-full px-4">
                                            <x-input-label
                                                class="capitalize"
                                                :value="__('adminify.categories.category_title_input')"
                                                for="category-{{  $locale }}"/>
                                            <x-text-input
                                                id="category-{{ $locale }}"
                                                type="text"
                                                name="{{ $locale }}[name]"
                                                class="mt-1"
                                            />
                                            <x-input-error :messages="$errors->get($locale . '.name')" class="mt-2"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-10 w-full lg:w-5/12">
                                <x-input-label
                                    class="capitalize"
                                    :value="__('adminify.categories.category_parent_id')"
                                    for="input_parent_id"
                                />
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
                                            class="hidden bg-white max-h-72 absolute z-10 mt-1 w-full overflow-auto rounded-md  py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                            tabindex="-1" id="container">
                                            <div data-role="category"
                                                 class="text-gray-900 relative cursor-default select-none py-1 pl-3 overflow-auto relative">
                                                <p data-category-id="{{ null }}"
                                                   class="block font-normal block truncate hover:bg-blue-600 hover:text-white">
                                                    -
                                                </p>
                                            </div>
                                            @foreach($categories->toTree() as $category)
                                                <x-admin.category-child-chooser :category="$category"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    const button = document.querySelector('button[data-role="category_parent_toggler"]')
                                    const selectedCategoryName = document.getElementById('chosen_text');
                                    const container = document.getElementById('container');
                                    button.addEventListener('click', () => {
                                        container.classList.remove('hidden');
                                        container.focus();
                                    })
                                    container.addEventListener('focusout', () => {
                                        container.classList.add('hidden')
                                    })
                                    container.querySelectorAll('p[data-category-id]').forEach((listItem) => {
                                        listItem.addEventListener('click', () => {
                                            const text = listItem.textContent;
                                            document.getElementById('parent_id').value = listItem.dataset.categoryId;
                                            document.getElementById('chosen_text').textContent = text
                                            document.activeElement.blur();
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full items-center justify-center">
                        <x-admin.primary-action-button as="submit" :value="__('adminify.submit')"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-admin.delete-action-confirmation-modal/>
</x-layouts.admin>
