@props([
    'parentId' => '',
    'parentName' => '',
    'category' => new \App\Models\Adminify\Category(),
    'border' => false,
    'lastSibling' => false,
])

<div class="py-1 px-3 cursor-pointer relative
    {{  $lastSibling ? "after:content-[''] after:absolute after:left-0 after:right-0 after:top-0 after:h-[25px] after:border-l after:border-l-gray-300" : ($category->isRootCategory() ?  : 'border-l border-gray-300') }}">
    <div class="flex w-full items-center justify-between px-2 py-0.5 group ">
        <div class="relative">
            @if(!$category->isRootCategory())
                <div class="absolute -left-5 top-1/2 h-0 w-4 border-t border-gray-300"></div>
            @endif
            <p class="block font-normal text-md {{ $category->isRootCategory() ? 'ml-1' : '' }}">
                {{ $category->name }}
            </p>
        </div>
        <div class="flex items-center justify-center space-x-4">
            <div class="rounded-md p-2 opacity-0 gradient-app-theme group-hover:opacity-100"
                 data-category="{{ json_encode($category) }}" data-parentId="{{ json_encode($parentId ?? [])}}"
                 data-parentName="{{ json_encode($parentName ?? []) }}"
                 edit-category-button>
                <x-icons.edit class="group-hover:text-white"/>
            </div>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" deletion-form
                  class="rounded-md p-2 opacity-0 gradient-app-theme group-hover:opacity-100">
                @method('DELETE')
                @csrf
                <button class="m-0 block p-0">
                    <x-icons.trash/>
                </button>
            </form>
        </div>
    </div>
    @foreach($category->children as $key => $child)
        <div class="ml-5 font-light">
            <x-admin.category-child
                :last-sibling="$loop->last"
                :border="true"
                :category="$child"
                :parent-id="$category->id"
                :parent-name="$category->name"
            />
        </div>
    @endforeach
</div>


