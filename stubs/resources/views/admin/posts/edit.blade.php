<x-layouts.admin>
    @push('scripts')
        @vite(['resources/js/admin/dynamic-meta-fields.js', 'resources/js/admin/rich-editor.js'])
    @endpush
    <div class="mx-auto w-full lg:w-10/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data"
              autocomplete="off" id="create_post_form" data-selectedTags="{{ $post->tags }}">
            @csrf
            <div id="tabContentExample">
                <div class="flex w-full flex-col-reverse items-start justify-start xl:flex-row">
                    @foreach($locales as $key => $locale)
                        <div class="mt-10 hidden w-full rounded-lg" id="profile-example-{{$locale}}" role="tabpanel"
                             aria-labelledby="profile-tab-example-{{$locale}}">
                            <div class="w-11/12 bg-white px-10 py-8 shadow-soft-2xl">
                                <div class="flex w-full flex-col items-start justify-center px-2">

                                    <x-input-label class="capitalize" for="title" :value="__('adminify.post_title')"/>

                                    <x-text-input
                                        id="title" class="mx-1 mt-1 block w-10/12"
                                        type="text" name="{{$locale}}[title]"
                                        :value="$post->translations?->get($locale)->title ?? ''"
                                    />

                                    <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>

                                </div>

                                <!-- Rich editor -->
                                <div class="mt-10 flex w-full flex-col items-start justify-center" id="rich-container">
                                    <label
                                        class="my-2 text-sm capitalize text-black">{{ __('adminify.post_body') }}</label>
                                    <textarea id="body-{{ $locale }}"
                                              name={{ $locale }}[body]">{{ $post->translations?->get($locale)->body ?? '' }}</textarea>
                                    <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>
                                </div>
                                <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                                    <x-admin.dropzone
                                        class="w-full capitalize h-64 {{ $errors->has($locale.'.featured_image_url') ? 'border-red-500 text-red-400' :'' }}"
                                        name="{{ $locale }}[featured_image_url]"
                                        acceptedFileTypes="image/*"
                                        :title="__('adminify.post_featured_image') "
                                        :action-text=" __('adminify.dropzone_action_1') "
                                        :description=" __('adminify.dropzone_action_2') "
                                        :file-types-text=" __('SVG, PNG, JPG or GIF') "
                                        :errors="$errors"
                                        :preview-url="$post->translations?->get($locale)?->media->first()->url ?? ''"
                                    />
                                </div>

                                <x-input-error :messages="$errors->get($locale.'.featured_image_url')" class="mt-2"/>


                                <div class="mt-4">
                                    <div class="mx-auto mt-5 w-11/12" meta_fields_container data-tab="{{$locale}}"
                                         data-meta_name_label="{{ __('adminify.post_meta_tag_name') }}"
                                         data-meta_value_label="{{ __('adminify.post_meta_tag_value') }}">
                                        @if($post->translations->get($locale)?->meta)
                                            @foreach($post->translations->get($locale)->meta as $name => $value)
                                                <div meta_fields_row
                                                    class="mt-3 flex flex-col-reverse items-end justify-center lg:space-x-4 lg:flex-row lg:items-start">
                                                    <div class="w-full lg:w-5/12">
                                                        <label
                                                            class='block text-sm font-medium text-gray-700'>{{ __('adminify.post_meta_tag_name') }}</label>
                                                        <input type="text" value="{{ $name }}"
                                                               name="{{ $locale }}[meta][name][]" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                                                                border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                                                                transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                    </div>
                                                    <div class="w-full lg:w-5/12">
                                                        <label
                                                            class='block text-sm font-medium text-gray-700'>{{ __('adminify.post_meta_tag_value') }}</label>
                                                        <input type="text" value="{{ $value }}"
                                                               name="{{ $locale }}[meta][value][]" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                                                                    border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                                                                    transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                    </div>
                                                    <div
                                                        class="flex h-full cursor-pointer flex-col items-center justify-center p-0.5 group hover:bg-red-300"
                                                        delete-meta>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" class='h-6 w-6 text-red-700'>
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
                                                class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
                                            {{  __('adminify.post_add_meta_action_button_text') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <input type="submit" value="{{ __('adminify.submit') }}"
                                           class="mt-5 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-10 w-full rounded-lg px-5 xl:w-3/12 xl:px-0">
                        <div class="mt-4 flex items-center justify-center">
                            <x-admin.radio-toggler :label="__('adminify.publish')" value="{{ $post->published }}"
                                                   class="mt-4"/>
                        </div>
                        <x-admin.tag-select />
                        <div class="w-full">
                            <x-admin.category-select :selected="$post->categories->pluck('id')->toArray()"
                                                     :categories="$categories"/>
                        </div>
                    </div>
                </div>
            </div>
            <x-admin.already-uploaded-media-chooser />
        </form>
    </div>
</x-layouts.admin>
