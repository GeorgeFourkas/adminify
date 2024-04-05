<x-layouts.admin>
    <div class="mx-auto w-11/12">
        <x-admin.language-tabs-header :locales="$locales"/>
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full lg:-ml-10">
                <div class="flex w-full flex-col-reverse items-start justify-start lg:space-x-8 xl:flex-row">
                    <div class="mx-3 mx-auto mt-10 w-11/12 rounded-lg bg-white px-5 py-8 shadow-soft-2xl lg:px-10 xl:w-9/12">
                        @foreach($locales as $locale)
                            <div class="mt-10 hidden w-full" id="tab_{{ $locale }}">
                                <div class="flex flex-col items-start justify-center">
                                    <div class="flex w-full flex-col items-start justify-center">
                                        <x-input-label class="capitalize" for="title"
                                                       :value="__('adminify.post_title')"/>
                                        <x-text-input id="title" type="text" class="mt-1 block w-full"
                                                      name="{{ $locale }}[title]"
                                                      :value="old($locale.'.title', $post->translate($locale)?->title)"/>
                                        <x-input-error :messages="$errors->get($locale . '.title')" class="mt-2"/>
                                    </div>
                                    <div class="mt-5 flex w-full flex-col items-start justify-center">
                                        <x-input-label class="capitalize" for="{{ $locale }}[body]"
                                                       value="{{ __('adminify.post_body') }}"/>
                                        <x-ck-editor name="{{ $locale }}[body]"
                                                     :value="old($locale . '.body', $post->translate($locale)?->body)"/>
                                        <x-input-error :messages="$errors->get($locale.'.body')" class="mt-2"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-5">
                            <x-filepond name="featured_image_url" :previews="old('featured_image_url', $post?->media)"/>
                        </div>
                        <x-input-error :messages="$errors->get('featured_image_url')" class="mt-2"/>
                        <div class="flex items-center justify-center">
                            <div class="flex items-center justify-center">
                                <x-admin.primary-action-button :value="__('adminify.submit')"/>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto mt-10 w-11/12 rounded-lg bg-white px-5 py-10 shadow-soft-2xl xl:w-3/12">
                        <div class="mt-4 flex items-center justify-center">
                            <x-admin.radio-toggler
                                :value="old('published', $post->published)"
                                :label="__('adminify.publish')"
                                class="mt-4"
                            />
                        </div>
                        <x-admin.tag-select :selected="$post->tags" :old="old('tags')"/>
                        <div class="w-full lg:mt-5">
                            <h3 class="block text-sm font-medium capitalize leading-6 text-gray-900">
                                {{ __('adminify.categories.page_title') }}
                            </h3>
                            <x-admin.category-select
                                :categories="$categories"
                                :selected="$post->categories->pluck('id')->merge(old('categories'))->toArray()"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin>
