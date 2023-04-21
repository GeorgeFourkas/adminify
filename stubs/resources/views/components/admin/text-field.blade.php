@props(['disabled' => false])

<label for="{{$id}}" class="mb-2 block text-sm font-medium text-gray-900">
    {{$label}}
</label>
<input type="text" id="{{$id}}" name="{{$name}}" value="{{$value}}"
       class="mx-3 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-gray-900 m:text-md
       focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700" @disabled($disabled)>
