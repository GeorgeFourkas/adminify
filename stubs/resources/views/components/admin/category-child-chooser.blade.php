@props([
    'category' => new \App\Models\Adminify\Category(),
    'children' => false,
])
<div data-role="category" class="text-gray-900 relative cursor-default select-none overflow-auto relative">
    <div
        class="w-full hover:bg-gradient-to-tl hover:from-adminify-main-color hover:to-adminify-secondary-color hover:text-white py-1 pl-1 rounded-sm">
        <p data-category-id="{{ $category->id }}"
           class="block font-normal block truncate {{ $children ? 'ml-5' : '' }}">
            {{ $category->name }}
        </p>
    </div>
    @foreach($category?->children as $child)
        <div class="{{ $children ? 'ml-5' : '' }}">
            <x-admin.category-child-chooser :children="true" :category="$child"/>
        </div>
    @endforeach
</div>


