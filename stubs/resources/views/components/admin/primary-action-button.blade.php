@props([
    'as' => 'input',
    'text' => ''
])

@if($as == 'button')
    <button {{ $attributes->merge(
    [
        "class" => "p-3 gradient-app-theme text-white shadow-soft-2xl capitalize text-xs rounded-lg hover-:bg-gradient-to-l hover:from-white hover:to-white hover:text-adminify-main-color transition-all duration-300",
    ]) }}>
        {{ $text }}
        {{ $slot ?? '' }}
    </button>
@elseif($as == "link")
    <a {{ $attributes->merge([
          "class" => "p-3 gradient-app-theme text-white shadow-soft-2xl capitalize text-xs rounded-lg hover-:bg-gradient-to-l hover:from-white hover:to-white hover:text-adminify-main-color transition-all duration-300",
    ]) }}>
        {{ $text }}

        {{ $slot ?? '' }}
    </a>
@elseif('input')
    <input
        {{ $attributes->merge([
                "class" => "mt-5 cursor-pointer rounded-md px-5 py-2 text-sm font-normal capitalize text-white gradient-app-theme",
                'type' => 'submit'
        ]) }}
    >
@endif

