{{--        $this->label = $label;
        $this->value = $value;--}}
@props( [
    'label' => '',
    'value' => '',
])


<div class="">
    <label class="relative inline-flex cursor-pointer items-center">
        <input type="checkbox" id="{{$attributes->has('id') ? $attributes->get('id') : 'checkbox'}}"
               name="{{$attributes->has('name') ? $attributes->get('name') : 'published'}}"
               {{$value ? 'checked' : ''}}
               class="sr-only peer">

        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300
                         dark:peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full
                         peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px]
                         after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full
                         after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-tl
                         peer-checked:from-purple-700 peer-checked:to-pink-500">
        </div>
        <span class="ml-3 text-sm font-medium text-gray-900 capitalize">
            {{$label}}
        </span>
    </label>
</div>
