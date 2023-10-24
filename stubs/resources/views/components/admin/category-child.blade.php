<div class="py-1 px-3 cursor-pointer {{$category->children->count() > 0 ? 'caret' : ''}}">
    <div class="flex w-full items-center justify-between px-3 py-2 group hover:bg-gray-100">
        <div class="">
            <p class="font-normal text-md">
                @if($category->children->count() > 0)
                    <span class="inline-block transition duration-200" caret>&#x203A;</span>
                @endif
                {{$category->name}}
            </p>
        </div>
        <div class="flex items-center justify-center space-x-4">
            <div class="rounded-md p-2 opacity-0 gradient-app-theme group-hover:opacity-100"
                 data-category="{{ json_encode($category) }}"
                 data-parentId="{{ json_encode($parentId ?? [])}}" data-parentName="{{json_encode($parentName ?? [])}}"
                 edit-category-button>
                <x-icons.edit class="group-hover:text-white"></x-icons.edit>
            </div>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" deletion-form
                  class="rounded-md p-2 opacity-0 gradient-app-theme group-hover:opacity-100">
                @method('DELETE')
                @csrf
                <button class="m-0 block p-0">
                    <x-icons.trash />
                </button>
            </form>
        </div>
    </div>
    <div class="{{ $category->children->count() > 0 ? 'caret' : '' }} bg-gray-50">
        @foreach($category->children as $child)
            <div class="mt-2 mr-1 hidden font-light" child-container>
                <x-admin.category-child
                    :category="$child"
                    :parent-id="$category->id"
                    :parent-name="$category->name"
                />
            </div>
        @endforeach
    </div>
</div>


