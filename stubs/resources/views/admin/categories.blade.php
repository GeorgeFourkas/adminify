<x-layouts.admin>
    <x-slot:head>
        @vite(['resources/js/admin/child-toggle.js', 'resources/js/admin/tabs.js' , 'resources/js/admin/category-crud.js', 'resources/js/admin/confirm-modal.js'])
    </x-slot:head>
    @php
        $locales = array_keys(config('translatable.locales'))
    @endphp


    <div
        class="w-full lg:w-11/12 mx-auto lg:mx-0 flex-none px-3 flex flex-col-reverse space-y-4 lg:space-y-0 lg:flex-row items-start justify-between lg:space-x-6 ">
        <div
            class="w-full lg:w-1/2 m-4 relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
            @if(Session::has('success'))
                <div
                    class="mx-auto flex h-10 w-full items-center justify-center rounded-t-lg bg-lime-500 px-6 text-white"
                    id="flash-container">
                    <p class="font-light">{{Session::get('success')}}</p>
                </div>
            @endif
            @if(Session::has('error'))
                <div
                    class="mx-auto flex h-10 w-full items-center justify-center rounded-t-lg bg-red-500 px-6 text-white"
                    id="flash-container">
                    <p class="font-light">{{Session::get('error')}}</p>
                </div>
            @endif
            <div class="flex w-full items-start justify-between border-b border-slate-100 py-5">
                <div
                    class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                    <h6>{{__('Categories')}}</h6>
                </div>
                <div
                    class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                    <button id="create_category"
                            class="p-3 gradient-app-theme text-white shadow-soft-2xl capitalize text-xs
                               rounded-lg hover:bg-gradient-to-l hover:from-white hover:to-white hover:text-paragraphGray
                               transition duration-300">
                        <x-icons.add></x-icons.add>
                        {{  __('Create Category') }}
                    </button>
                </div>
            </div>
            <div class="font-semibold px-5 mt-5">
                @foreach($categories->toTree() as $category)
                    <div class="">
                        <x-admin.category-child parent-id="" parent-name="" :category="$category"/>
                    </div>
                @endforeach
            </div>
        </div>
        <div
            class="w-full lg:w-1/2 bg-white shadow-soft-2xl rounded-lg px-5 py-7 hidden flex items-center justify-center"
            id="crud-panel">
            <div class="w-full">
                <x-admin.language-tabs-header :locales="$locales"/>
                <form id="categories_crud_form" action="{{ route('categories.store') }}" method="POST"
                      data-save="{{route('categories.store')}}" data-update="{{route('categories')}}">
                    @csrf
                    <div id="tabContentExample" class="w-full">
                        <div class="flex flex-col lg:flex-row items-start justify-start w-full lg:space-x-1">
                            <div class="w-full lg:w-6/12 mt-5 lg:mt-0">
                                @foreach($locales as $key => $locale)
                                    <div class="mt-10 hidden rounded-lg w-full" id="profile-example-{{$locale}}"
                                         role="tabpanel" aria-labelledby="profile-tab-example-{{$locale}}">
                                        <div class="w-full px-4">
                                            <x-input-label value="Category Name" for="category-{{$locale}}"/>
                                            <x-text-input id="category-{{$locale}}" type="text" name="{{$locale}}[name]"
                                                          class="mt-1"/>
                                            <x-input-error :messages="$errors->get($locale . '.name')" class="mt-2"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="w-full lg:w-5/12 mt-10">
                                <x-input-label value="Parent Category" for="input_parent_id"/>
                                <select id="input_parent_id" name="parent_id"
                                        class="block py-2.5 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option value="" selected></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-center">
                        <input
                            class="px-5 py-2 text-sm gradient-app-theme text-white font-normal rounded-md mb-10 mt-5 cursor-pointer"
                            type="submit"
                            value="{{__('Submit')}}"
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-admin.delete-action-confirmation-modal></x-admin.delete-action-confirmation-modal>
</x-layouts.admin>
