@props([
    'category' => new \App\Models\Adminify\Category(),
])
<div data-role="category" class="relative cursor-default select-none overflow-auto py-1 pl-3 text-gray-900">
    <p data-category-id="{{ $category->id }}"
       class="block truncate font-normal hover:bg-blue-600 hover:text-white">
        {{ $category->name }}
    </p>
    @foreach($category?->children as $child)
        <div class="ml-1">
            <x-admin.category-child-chooser :category="$child"/>
        </div>
    @endforeach
</div>


