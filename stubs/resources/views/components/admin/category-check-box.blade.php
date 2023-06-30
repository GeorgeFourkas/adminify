@pushonce('scripts')
    @vite('resources/js/admin/category-checkbox-click.js')
@endpushonce

<div class="flex items-center w-full" category-checkbox>
    <input type="checkbox" value="{{$category->id}}" name="categories[]" @checked($tobeChecked ?? false)
    class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 rounded focus:ring-0 focus:ring-offset-0">
    <label for="" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        {{$category->translation->name ?? __('Translation not set')}}
    </label>
</div>
<p>{{$attributes->get('checked')}}</p>
@foreach($category->children as $child)
    <div class="ml-3 mt-2  font-light">
        <x-admin.category-check-box :selected="$selected ?? []" :category="$child"
                                    :tobe-checked="in_array($child->id, $selected)"/>
    </div>
@endforeach

