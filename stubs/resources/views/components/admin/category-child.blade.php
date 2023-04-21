<div class="py-1 px-3 cursor-pointer {{$category->children->count() > 0 ? 'caret' : ''}}">
    <div class="w-full hover:bg-gray-100 py-2 px-3 flex items-center justify-between group">
        <div class="">
            <p class="text-md font-normal">
                @if($category->children->count() > 0)
                    <span class="transition duration-200 inline-block" caret>&#x203A;</span>
                @endif
                {{$category->name}}
            </p>
        </div>
        <div class="flex items-center justify-center space-x-4">
            <div class="opacity-0 group-hover:opacity-100 gradient-app-theme rounded-md p-2"
                 data-category="{{ json_encode($category) }}"
                 data-parentId="{{json_encode($parentId ?? [])}}" data-parentName="{{json_encode($parentName ?? [])}}"
                 edit-category-button>
                <x-icons.edit class="group-hover:text-white"></x-icons.edit>
            </div>

            <form action="{{ route('categories.destroy', $category) }}" method="POST" deletion-form
                  class="opacity-0 group-hover:opacity-100 gradient-app-theme rounded-md p-2">
                @method('DELETE')
                @csrf
                <button class="p-0 m-0 block">
                    <x-icons.trash></x-icons.trash>
                </button>
            </form>


        </div>
    </div>
    <div class="{{ $category->children->count() > 0 ? 'caret' : '' }} bg-gray-100">
        @foreach($category->children as $child)
            <div class="mr-1 mt-2  font-light hidden" child-container>
                <x-admin.category-child
                    :category="$child"
                    :parent-id="$category->id"
                    :parent-name="$category->name"
                />
            </div>
        @endforeach
    </div>
</div>


