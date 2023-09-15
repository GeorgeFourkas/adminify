@pushonce('scripts')
    @vite('resources/js/admin/category-checkbox-click.js')
@endpushonce

<div class="flex w-full items-center" category-checkbox>
    <input type="checkbox" value="{{$category->id}}" name="categories[]" @checked($tobeChecked ?? false)
    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-pink-600 focus:ring-0 focus:ring-offset-0">
    <label for="" class="ml-2 text-sm font-medium capitalize text-gray-900 dark:text-gray-300">
        {{$category->translation->name ?? __('Translation not set')}}
    </label>
</div>
<p>{{$attributes->get('checked')}}</p>
@foreach($category->children as $child)
    <div class="mt-2 ml-3 font-light">
        <x-admin.category-check-box :selected="$selected ?? []" :category="$child"
                                    :tobe-checked="in_array($child->id, $selected)"/>
    </div>
@endforeach

