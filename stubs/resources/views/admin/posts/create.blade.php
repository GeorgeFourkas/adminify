<x-layouts.admin>
    @push('scripts')
        @vite(['resources/js/admin/dynamic-meta-fields.js', 'resources/js/admin/rich-editor.js'])
    @endpush
    <div class="mx-auto w-full lg:w-10/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form id="create_post_form" action="{{ route('posts.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="tabContentExample" class="w-full">
                <div class="flex w-full flex-col-reverse items-start justify-start xl:flex-row">
                    @foreach($locales as $key => $locale)
                        <div class="mt-10 hidden w-full rounded-lg" id="profile-example-{{$locale}}"
                             role="tabpanel" aria-labelledby="profile-tab-example-{{$locale}}">
                            <div class="flex items-start justify-center">
                                <div class="mx-3 w-full bg-white px-10 py-8 shadow-soft-2xl">
                                    <div class="flex w-full flex-col items-start justify-start px-2">

                                        <x-input-label class="capitalize" for="title"
                                                       :value="__('adminify.post_title')"/>

                                        <x-text-input id="title" type="text" class="mx-2 mt-1 block w-full"
                                                      name="{{$locale}}[title]" :value="old($locale.'.title')"/>

                                        <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>

                                    </div>
                                    <!-- Rich editor -->
                                    <div class="mt-5 flex w-full flex-col items-start justify-center"
                                         id="rich-container">

                                        <label
                                            class="my-2 text-sm capitalize text-black">{{ __('adminify.post_body') }}</label>

                                        <textarea id="body-{{ $locale }}" class="w-full border-2 border-green-500"
                                                  name={{$locale}}[body]">{{ old($locale.'.body') }}</textarea>

                                        <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>

                                    </div>
                                    <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                                        <x-admin.dropzone
                                            class="w-full capitalize h-64 {{ $errors->has($locale.'.featured_image_url') ? 'border-red-500 text-red-400' :'' }}"
                                            name="{{ $locale }}[featured_image_url]"
                                            acceptedFileTypes="image/*"
                                            :id="$locale"
                                            :title="__('adminify.post_featured_image') "
                                            :action-text=" __('adminify.dropzone_action_1') "
                                            :description=" __('adminify.dropzone_action_2') "
                                            :file-types-text=" __('SVG, PNG, JPG or GIF') "
                                            :errors="$errors"
                                        />
                                    </div>
                                    <x-input-error :messages="$errors->get($locale.'.featured_image_url')"
                                                   class="mt-2"/>

                                    <div class="mt-4">
                                        <div class="mx-auto mt-5 w-11/12" data-tab="{{ $locale }}"
                                             meta_fields_container
                                             data-meta_name_label="{{ __('adminify.post_meta_tag_name') }}"
                                             data-meta_value_label="{{ __('adminify.post_meta_tag_value') }}">
                                        </div>
                                        <div class="flex items-center justify-center">
                                            <button append_meta_field_btn
                                                    class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
                                                {{ __('adminify.post_add_meta_action_button_text') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input type="submit" value="{{ __('adminify.submit') }}"
                                               class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal capitalize text-white gradient-app-theme">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-10 w-full rounded-lg px-5 xl:w-3/12 xl:px-0">
                        <div class="mt-4 flex items-center justify-center">
                            <x-admin.radio-toggler :label="__('adminify.publish')" value="published" class="mt-4"/>
                        </div>
                        <x-admin.tag-select/>
                        <div class="w-full">
                            <x-admin.category-select :categories="$categories" :selected="[]"/>
                        </div>
                    </div>
                </div>
            </div>
            <x-admin.already-uploaded-media-chooser/>
        </form>
    </div>
</x-layouts.admin>
