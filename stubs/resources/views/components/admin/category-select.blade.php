@props([
    'categories' => collect(),
    'selected' => [],
])
@pushonce('scripts')
    @vite('resources/js/admin/create-category-from-modal.js')
@endpushonce

<p class="cursor-pointer text-center capitalize text-blue-400" modal_trigger
   modal_trigger_for="#create_new_category"> {{ __('adminify.create_new_category_modal') }} </p>

<div class="bg-white shadow-soft-2xl mt-5 rounded-lg px-3 py-3 mb-6 {{ $categories->isEmpty() ? 'hidden' : '' }}"
     id="categories_container">
    @foreach($categories as $category)
        <x-admin.category-check-box
            :category="$category"
            :selected="$selected ?? []"
            :tobe-checked="in_array($category->id, $selected ?? [])"
        />
    @endforeach
</div>

<x-admin.modal-overlay id="create_new_category">
    <div class="relative w-1/4 rounded-lg bg-white p-4">
        <h1 class="text-center text-xl capitalize">
            {{ __('Create New Category') }}
        </h1>
        <div class="max-w-1/2">
            @csrf
            <div class="mx-auto my-4 flex w-full flex-col items-start justify-start">

                <x-input-label class="capitalize" for="new_category_name"
                               :value="__('adminify.categories.category_title_input') . ':'"/>

                <x-text-input id="new_category_name" type="text" class="mx-2 mt-1 block" name="name"/>

            </div>

            <div class="flex items-center justify-center">
                <input type="submit" id="submit_new_category" value="{{ __('adminify.submit') }}"
                       class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
            </div>
        </div>
    </div>
</x-admin.modal-overlay>

