@if(!empty($categories))
    <div class="bg-white shadow-soft-2xl mt-5 rounded-lg px-3 py-3 mb-6">
        @foreach($categories as $category)
            <x-admin.category-check-box :category="$category" :selected="$selected ?? []"
                                        :tobe-checked="in_array($category->id, $selected)"/>
        @endforeach
    </div>
@endif
