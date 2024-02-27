@props(['label', 'optionTexts', 'selected' => null, 'value' => null])
<label for="{{ $attributes->get('id') }}"
       class="mb-2 block text-sm font-medium capitalize text-gray-900 dark:text-white">
    {{ $label }}
</label>
<select
    id="{{ $attributes->get('id') }}" name="{{ $attributes->get('name') ?? 'select'}}"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 p-2.5 focus:border-blue-500 block w-full capitalize">
    @foreach($selectTexts as $key => $optionText)
        <option class="capitalize"
                {{ isset($value) && $optionText == $value ? 'selected' : '' }}
                value="{{ $optionText }}">
            {{ $optionText }}
        </option>
    @endforeach
</select>


