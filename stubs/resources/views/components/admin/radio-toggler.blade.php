@props( [
    'label' => '',
    'value' => '',
])
<div class="">
    <label class="relative inline-flex cursor-pointer items-center">
        <input type="checkbox" id="{{ $attributes->has('id') ? $attributes->get('id') : 'checkbox' }}"
               name="{{ $attributes->has('name') ? $attributes->get('name') : 'published' }}" class="sr-only peer"
               {{ $value ? 'checked' : '' }} >
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-tl peer-checked:from-adminify-main-color peer-checked:to-adminify-secondary-color"></div>
        <span class="ml-3 text-sm font-medium capitalize text-gray-900">{{ $label }}</span>
    </label>
</div>
