
@props([
    'id' => '',
    'tabName' => '',
])

<li class="w-full border-0 max-w-[200px]" role="presentation">
    <button
        class="inline-block w-full rounded-md border-0 px-2 py-2 group hover:bg-gradient-to-tl hover:from-adminify-main-color hover:to-adminify-secondary-color focus:outline-none"
        type="button" tab_header tab="#tab_{{ $id }}" id="{{ $id }}">
        <span class="flex items-center justify-center group-hover:text-white">
            {{ $slot }}
            {{ $tabName }}
        </span>
    </button>
</li>
