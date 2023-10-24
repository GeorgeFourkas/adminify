@props([
    'categories' => collect(),
    'selected' => [],
])
@pushonce('scripts')
    @vite('resources/js/admin/create-category-from-modal.js')
@endpushonce

<p class="cursor-pointer text-center capitalize text-blue-400" modal_trigger modal_trigger_for="#create_new_category">
    {{ __('adminify.create_new_category_modal') }}
</p>

<div class="mt-5 rounded-lg px-3 py-3 {{ $categories->isEmpty() ? 'hidden' : '' }}" id="categories_container">
    @foreach($categories as $category)
        <x-admin.category-check-box
            :category="$category"
            :selected="$selected ?? []"
            :tobe-checked="in_array($category->id, $selected ?? [])"
        />
    @endforeach
</div>
<x-admin.modal-overlay id="create_new_category">
    <div class="relative w-11/12 md:w-10/12 lg:w-3/4 xl:w-1/4 rounded-lg bg-white py-7 px-4">
        <h1 class="text-center text-xl capitalize">
            {{ __('adminify.post_create_new_category') }}
        </h1>
        <div class="max-w-11/12 lg:max-w-1/2">
            @csrf
            <div class="mx-auto my-4 flex w-full flex-col items-start justify-start">
                <x-input-label class="capitalize" for="new_category_name"
                               :value="__('adminify.categories.category_title_input') . ':'"/>
                <x-text-input id="new_category_name" type="text" class="mx-2 mt-1 block"
                              name="{{ app()->getLocale() }}[name]"/>
            </div>
            <div class="flex items-center justify-center">
                <x-admin.primary-action-button as="submit" :value="__('adminify.submit')" id="submit_new_category"/>
            </div>
        </div>
    </div>
</x-admin.modal-overlay>

