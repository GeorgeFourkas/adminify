<x-layouts.admin>
    @push('scripts')
      @vite('resources/js/admin/rich-editor.js')
    @endpush
    <div class="mx-auto w-full lg:w-10/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form action="{{ route('posts.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <div class="flex w-full flex-col-reverse items-start justify-start xl:flex-row">

                    <div class="mx-3 w-full bg-white mt-10 px-5 lg:px-10 py-8 shadow-soft-2xl rounded-lg">
                        @foreach($locales as $key => $locale)
                            <div class="mt-10 hidden w-full" id="profile-example-{{$locale}}">

                                <div class="flex flex-col items-start justify-center">

                                    <div class="flex w-full flex-col items-start justify-center">

                                        <x-input-label class="capitalize" for="title"
                                                       :value="__('adminify.post_title')"/>

                                        <x-text-input id="title" type="text" class="mt-1 block w-full"
                                                      name="{{$locale}}[title]" :value="old($locale.'.title')"/>

                                        <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>

                                    </div>
                                    <!-- Rich editor -->
                                    <div class="mt-5 flex w-full flex-col items-start justify-center">
                                        <label class="my-2 text-sm capitalize text-black">
                                            {{ __('adminify.post_body') }}
                                        </label>
                                        <textarea id="body-{{ $locale }}" class="w-full border-2 border-green-500"
                                                  name={{$locale}}[body]">{{ old($locale.'.body') }}</textarea>

                                        <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                            <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                                <x-admin.dropzone
                                    class="w-full capitalize h-64 {{ $errors->has('featured_image_url') ? 'border-red-500 text-red-400' :'' }}"
                                    name="featured_image_url"
                                    acceptedFileTypes="image/*"
                                    id="featured_image_url"
                                    :title="__('adminify.post_featured_image') "
                                    :action-text=" __('adminify.dropzone_action_1') "
                                    :description=" __('adminify.dropzone_action_2') "
                                    :file-types-text=" __('SVG, PNG, JPG or GIF') "
                                    :errors="$errors"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('featured_image_url')"
                                           class="mt-2"/>

                        <div class="flex items-center justify-center">
                            <input type="submit" value="{{ __('adminify.submit') }}"
                                   class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal capitalize text-white gradient-app-theme">
                        </div>

                    </div>


                    <div class="mt-10 w-full rounded-lg px-5 xl:w-3/12 xl:px-0">
                        <div class="mt-4 flex items-center justify-center">
                            <x-admin.radio-toggler :label="__('adminify.publish')" value="published" class="mt-4"/>
                        </div>
                        <x-admin.tag-select :old="old('tags')"/>
                        <div class="w-full lg:mt-5">
                            <x-admin.category-select :categories="$categories" :selected="old('categories')"/>
                        </div>
                    </div>

                </div>
            </div>
            <x-admin.already-uploaded-media-chooser/>
        </form>
    </div>
</x-layouts.admin>
