<x-layouts.admin>
    @pushonce('scripts')
        @vite('resources/js/admin/child-toggle.js')
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
                    <x-admin.primary-action-button id="create_category" as="button"
                                                   :text="__('adminify.categories.add_category_button')">
                        <x-icons.add/>
                    </x-admin.primary-action-button>
                </div>

            </div>
            <div class="mt-5 px-5 font-semibold">
                @foreach($categories->toTree() as $category)
                    <div class="">
                        <x-admin.category-child parent-id="" parent-name="" :category="$category"/>
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
                                            <x-input-label class="capitalize"
                                                           :value="__('adminify.categories.category_title_input')"
                                                           for="category-{{  $locale }}"/>
                                            <x-text-input id="category-{{$locale}}" type="text" name="{{$locale}}[name]"
                                                          class="mt-1"/>
                                            <x-input-error :messages="$errors->get($locale . '.name')" class="mt-2"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-10 w-full lg:w-5/12">
                                <x-input-label class="capitalize" :value="__('adminify.categories.category_parent_id')"
                                               for="input_parent_id"/>
                                <select id="input_parent_id" name="parent_id"
                                        class="mt-1 block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-3 py-2 text-sm text-gray-500 peer focus:border-gray-200 focus:outline-none focus:ring-0">
                                    <option value="" selected></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full items-center justify-center">
                        <x-admin.primary-action-button as="submit" :value="__('adminify.submit')" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-admin.delete-action-confirmation-modal/>
</x-layouts.admin>
