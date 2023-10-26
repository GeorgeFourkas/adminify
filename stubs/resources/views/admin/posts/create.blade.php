<x-layouts.admin>
    <div class="mx-auto w-full lg:w-10/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form action="{{ route('posts.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full lg:-ml-10">
                <div class="flex w-full flex-col-reverse items-start justify-start lg:space-x-8 xl:flex-row">
                    <div class="mx-3 mx-auto mt-10 w-11/12 rounded-lg bg-white px-5 py-8 shadow-soft-2xl xl:w-9/12 lg:px-10">
                        @foreach($locales as $locale)
                            <div class="mt-10 hidden w-full" id="tab_{{ $locale }}">
                                <div class="flex flex-col items-start justify-center">
                                    <div class="flex w-full flex-col items-start justify-center">
                                        <x-input-label class="capitalize" for="title"
                                                       :value="__('adminify.post_title')"/>
                                        <x-text-input id="title" type="text" class="mt-1 block w-full"
                                                      name="{{$locale}}[title]" :value="old($locale.'.title')"/>
                                        <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>
                                    </div>
                                    <div class="mt-5 flex w-full flex-col items-start justify-center">
                                        <x-input-label class="capitalize" for="{{ $locale }}[body]"
                                                       value="{{ __('adminify.post_body') }}"/>
                                        <x-ck-editor name="{{ $locale }}[body]" :value="old($locale . '.body')"/>
                                        <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-5">
                            <x-filepond class="" name="featured_image_url" :previews="old('featured_image_url')"/>
                        </div>
                        <x-input-error :messages="$errors->get('featured_image_url')" class="mt-2"/>
                        <div class="flex items-center justify-center">
                            <x-admin.primary-action-button :value="__('adminify.submit')" />
                        </div>
                    </div>
                    <div class="mx-auto mt-10 w-11/12 rounded-lg bg-white px-5 py-10 shadow-soft-2xl xl:w-3/12">
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
        </form>
    </div>
</x-layouts.admin>
