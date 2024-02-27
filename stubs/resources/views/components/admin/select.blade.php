@props(['label', 'optionTexts', 'selected' => null, 'value' => null])
<label for="{{ $attributes->get('id') }}"
       class="mb-2 block text-sm font-medium capitalize text-gray-900 dark:text-white">
    {{ $label }}
</label>
<select
    id="{{ $attributes->get('id') }}" name="{{ $attributes->get('name') ?? 'select'}}"
    class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm capitalize text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500">
    @foreach($selectTexts as $key => $optionText)
        <option class="capitalize"
                {{ isset($value) && $optionText == $value ? 'selected' : '' }}
                value="{{ $optionText }}">
            {{ $optionText }}
        </option>
    @endforeach
</select>


