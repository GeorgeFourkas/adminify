<div>
    <a href="{{$link}}"
       class="{{Route::currentRouteName() == $text ? 'border-b-2 border-b-orangy text-white': 'text-gray-300 border-b-2 border-transparent'}}
       hover:border-b-orangy px-3 py-2 text-sm font-medium capitalize mt-10"
       aria-current="page">
        {{ __($text) }}
    </a>
</div>
