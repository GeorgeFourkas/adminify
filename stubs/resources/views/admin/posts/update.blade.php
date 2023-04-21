<x-layouts.admin>
    @php
        $locales = array_keys(config('translatable.locales'))
    @endphp
    <x-slot:head>
        @vite(['resources/js/admin/tabs.js', 'resources/js/admin/rich-editor.js', 'resources/js/admin/dropzone.js', 'resources/js/admin/tags-input.js' ,'resources/js/admin/dynamic-meta-fields.js'])
    </x-slot:head>
    <div class="mx-auto w-full lg:w-10/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data"
              autocomplete="off"
              id="create_post_form"
              data-selectedTags="{{($post->tags)}}">
            @csrf
            <div id="tabContentExample">
                <div class="flex flex-col-reverse xl:flex-row items-start justify-start w-full">
                    @foreach($locales as $key => $locale)
                        <div class="mt-10 hidden rounded-lg w-full"
                             id="profile-example-{{$locale}}" role="tabpanel"
                             aria-labelledby="profile-tab-example-{{$locale}}">
                            <div class="bg-white shadow-soft-2xl  py-8 px-10 w-11/12">
                                <div class="flex flex-col lg:flex-row w-full items-center justify-center">
                                    <div class="flex w-full lg:w-1/2 items-center justify-center px-2">
                                        <x-input-label for="title" :value="__('Title')"/>
                                        <x-text-input
                                            id="title"
                                            class="mt-1 mx-1 block w-10/12"
                                            type="text"
                                            name="{{$locale}}[title]"
                                            :value="$post->translations?->get($locale)->title ?? ''"
                                        />
                                        <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>

                                    </div>
                                    <div class="mx-4 mt-5 flex w-full items-center justify-center lg:mt-0 lg:w-1/2">
                                        <x-input-label for="slug" :value="__('Slug')"/>
                                        <x-text-input
                                            id="slug"
                                            :disabled="true"
                                            class="mt-1 mx-1 block w-10/12"
                                            type="text"
                                            :value="$post->translations?->get($locale)->slug ?? ''"
                                        />
                                        <x-input-error :messages="$errors->get($locale . '.slug')" class="mt-2"/>
                                    </div>
                                </div>
                                <!-- Rich editor -->
                                <div class="mt-10 flex w-full flex-col items-start justify-center" id="rich-container">
                                    <label class="my-2 text-sm text-black">{{__('Post Body')}}</label>
                                    <textarea id="body-{{$locale}}"
                                              name={{$locale}}[body]">{{$post->translations?->get($locale)->body ?? ''}}</textarea>
                                    <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>
                                </div>
                                <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                                    <x-admin.dropzone
                                        class="w-full h-64 {{$errors->has($locale . '.featured_image_url') ? 'border-red-500 text-red-400' :'' }}"
                                        name="{{$locale}}[featured_image_url]"
                                        acceptedFileTypes="image/*"
                                        :id="$locale"
                                        :preview-url="$post->translations?->get($locale)?->media->first()->url ?? ''"
                                        :title="__('Post Featured Image')"
                                        :actionText="__('Click To Upload')"
                                        :description="__('or drag and drop')"
                                        :fileTypesText="__('SVG, PNG, JPG or GIF')"
                                    />
                                </div>
                                <x-input-error :messages="$errors->get($locale.'.featured_image_url')" class="mt-2"/>


                                <div class="mt-4">
                                    <div class=" w-11/12 mx-auto mt-5" meta_fields_container data-tab="{{$locale}}"
                                         data-meta_name_label="{{ __('Meta Tag Name') }}"
                                         data-meta_value_label="{{ __('Meta Tag Value') }}">
                                        @if($post->translations->get($locale)?->meta)
                                            @foreach($post->translations->get($locale)->meta as $name => $value)
                                                <div
                                                    class="flex flex-col-reverse lg:flex-row items-end lg:items-start justify-center lg:space-x-4 mt-3"
                                                    meta_fields_row>
                                                    <div class="lg:w-5/12 w-full">
                                                        <label
                                                            class='block font-medium text-sm text-gray-700'>{{ __('Meta Tag Name') }}</label>
                                                        <input type="text" value="{{$name}}"
                                                               name="{{$locale}}[meta][name][]" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                                                                border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                                                                transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                    </div>
                                                    <div class="lg:w-5/12 w-full">
                                                        <label
                                                            class='block font-medium text-sm text-gray-700'>{{ __('Meta Tag Value') }}</label>
                                                        <input type="text" value="{{$value}}"
                                                               name="{{$locale}}[meta][value][]" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                                                                    border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                                                                    transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                    </div>
                                                    <div
                                                        class="flex flex-col items-center justify-center cursor-pointer hover:bg-red-300 p-0.5 group h-full"
                                                        delete-meta>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" class='w-6 h-6 text-red-700'>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button append_meta_field_btn
                                                class="px-5 py-2 text-sm gradient-app-theme text-white font-normal rounded-md mb-10 mt-5 cursor-pointer">
                                            {{  __('Add Field') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <input type="submit" value="Submit"
                                           class="px-5 py-2 text-sm gradient-app-theme text-white font-normal
                                  rounded-md mt-5 cursor-pointer">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="w-full xl:w-3/12 rounded-lg mt-10 px-5 xl:px-0">
                        <div class="mt-4 flex items-center justify-center">
                            <x-admin.radio-toggler :label="__('Publish Post')" value="{{$post->published}}"
                                                   class="mt-4"/>
                        </div>
                        <x-admin.tag-select/>
                        <div class=" w-full">
                            <x-admin.category-select :selected="$post->categories->pluck('id')->toArray()"
                                                     :categories="$categories"/>
                        </div>
                    </div>
                </div>
            </div>
            <x-admin.already-uploaded-media-chooser></x-admin.already-uploaded-media-chooser>
        </form>
    </div>
</x-layouts.admin>
