@props([
    'category' => new \App\Models\Adminify\Category(),
])
<div data-role="category" class="text-gray-900 relative cursor-default select-none py-1 pl-3 overflow-auto relative">
    <p data-category-id="{{ $category->id }}" class="block font-normal block truncate hover:bg-blue-600 hover:text-white">
        {{ $category->name }}
    </p>
    @foreach($category?->children as $child)
        <div class="ml-1">
            <x-admin.category-child-chooser :category="$child"/>
        </div>
    @endforeach
</div>


