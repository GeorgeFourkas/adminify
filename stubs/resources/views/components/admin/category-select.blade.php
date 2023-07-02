@props([
    'categories' => collect(),
    'selected' => [],
])
@pushonce('scripts')
    @vite('resources/js/admin/create-category-from-modal.js')
@endpushonce

<p class="text-blue-400 capitalize text-center cursor-pointer" modal_trigger modal_trigger_for="#create_new_category"> {{ __('Crew New Category') }} </p>

<div class="bg-white shadow-soft-2xl mt-5 rounded-lg px-3 py-3 mb-6 {{ $categories->isEmpty() ? 'hidden' : '' }}" id="categories_container">
    @foreach($categories as $category)
        <x-admin.category-check-box
            :category="$category"
            :selected="$selected ?? []"
            :tobe-checked="in_array($category->id, $selected ?? [])"
        />
    @endforeach
</div>

<x-admin.modal-overlay id="create_new_category">
    <div class="bg-white rounded-lg w-1/4 p-4 relative">
        <h1 class="text-center text-xl">
            {{ __('Create New Category') }}
        </h1>
        <div  class="max-w-1/2 ">
            @csrf
            <div class="w-full flex flex-col items-start justify-start my-4 mx-auto">
                <x-input-label class="capitalize" for="new_category_name" :value="__('category') . ':'"/>
                <x-text-input id="new_category_name" type="text" class="mt-1 mx-2 block" name="name"/>
            </div>

            <div class="flex items-center justify-center">
                <input type="submit" id="submit_new_category" value="{{  __('Submit') }}"
                       class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
            </div>
        </div>
    </div>
</x-admin.modal-overlay>

