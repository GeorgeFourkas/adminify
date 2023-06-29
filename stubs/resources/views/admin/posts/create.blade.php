<x-layouts.admin>
    @php
        $locales = array_keys(config('translatable.locales'));

        $defaultLocale = config('app.fallback_locale');
    @endphp
    <x-slot:head>
        @vite([
            'resources/js/admin/rich-editor.js',
        ])
    </x-slot:head>
    <div class="mx-auto w-full lg:w-10/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form id="create_post_form" action="{{ route('posts.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="tabContentExample" class="w-full">
                <div class="flex flex-col-reverse xl:flex-row items-start justify-start w-full ">
                    @foreach($locales as $key => $locale)
                        <div class="mt-10 hidden rounded-lg w-full"
                             id="profile-example-{{$locale}}"
                             role="tabpanel" aria-labelledby="profile-tab-example-{{$locale}}">
                            <div class="flex items-start justify-center">
                                <div class="bg-white shadow-soft-2xl  py-8 px-10 mx-3 w-full">
                                    <div class="flex flex-col lg:flex-row w-full items-center justify-start">
                                        <div class="flex w-full items-center justify-start px-2">
                                            <x-input-label
                                                for="title"
                                                :value="__('Title')"></x-input-label>
                                            <x-text-input
                                                id="title"
                                                type="text"
                                                class="mt-1 mx-2 block w-full"
                                                name="{{$locale}}[title]"
                                                :value="old($locale.'.title')"
                                            ></x-text-input>
                                            <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>
                                        </div>
                                    </div>
                                    <!-- Rich editor -->
                                    <div class="mt-5 flex w-full flex-col items-start justify-center"
                                         id="rich-container">
                                        <label class="my-2 text-sm text-black">{{__('Post Body')}}</label>
                                        <textarea
                                            id="body-{{$locale}}"
                                            class="border-2 border-green-500"
                                            name={{$locale}}[body]">
                                            {{old($locale.'.body')}}</textarea>

                                        <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>
                                    </div>
                                    <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                                        <x-admin.dropzone
                                            class="w-full h-64 {{$errors->has($locale.'.featured_image_url') ? 'border-red-500 text-red-400' :'' }}"
                                            name="{{$locale}}[featured_image_url]"
                                            acceptedFileTypes="image/*"
                                            :id="$locale"
                                            :title="__('Post Featured Image')"
                                            :actionText=" __('Click To Upload')"
                                            :description="__('or drag and drop')"
                                            :fileTypesText="__('SVG, PNG, JPG or GIF')"
                                            :errors="$errors"
                                        />
                                    </div>
                                    <x-input-error :messages="$errors->get($locale.'.featured_image_url')"
                                                   class="mt-2"/>

                                    <div class="mt-4">
                                        <div class=" w-11/12 mx-auto mt-5" meta_fields_container data-tab="{{$locale}}"
                                             data-meta_name_label="{{ __('Meta Tag Name') }}"
                                             data-meta_value_label="{{ __('Meta Tag Value') }}">
                                        </div>
                                        <div class="flex items-center justify-center">
                                            <button append_meta_field_btn
                                                    class="px-5 py-2 text-sm gradient-app-theme text-white font-normal rounded-md mb-10 mt-5 cursor-pointer">
                                                {{  __('Add Field') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input
                                            class="px-5 py-2 text-sm gradient-app-theme text-white font-normal rounded-md mb-10 mt-5 cursor-pointer"
                                            type="submit" value="{{__('Submit')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="w-full xl:w-3/12 rounded-lg mt-10 px-5 xl:px-0">
                        <div class="mt-4 flex items-center justify-center">
                            <x-admin.radio-toggler
                                :label="__('Publish Post')"
                                value="published"
                                class="mt-4"
                            />
                        </div>
                        <x-admin.tag-select/>
                        <div class=" w-full">
                            <x-admin.category-select :categories="$categories" :selected="[]"/>
                        </div>
                    </div>
                </div>
            </div>
            <x-admin.already-uploaded-media-chooser></x-admin.already-uploaded-media-chooser>
        </form>
    </div>
</x-layouts.admin>
