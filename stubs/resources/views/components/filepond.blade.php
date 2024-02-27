@pushonce('scripts')
    @vite('resources/js/admin/filepond/filepond.js')
@endpushonce
@props([
    'name',
    'previews' => [],
    'circular' => false,
    'uploadedChooser' => true,
])

@php
    $multipleAttribute = '';
    if ($attributes->has('multiple')){
        $multipleAttribute = 'multiple';
        if (!str_ends_with($name, '[]')){
            $name = $name . '[]';
        }
    }

$final = collect($previews)->map(function ($item) {
    return is_string($item) && json_decode($item) !== null ? json_decode($item) : $item;
})->toJson();
@endphp
<div pond_container>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <div class="w-full animate-pulse rounded-md bg-gray-100 h-[76px]" pond_loader>
            <div class="flex w-full items-center justify-center h-[76px]">
                <div class="h-2 w-56 bg-gray-200"></div>
            </div>
        </div>
    @endif
    <input
        class="{{ $attributes->get('class') }} hidden"
        upload="upload/media/async"
        {{ $circular ? 'circular' : '' }}
        pond type="file" id="file" base_url="{{ url('/') }}"
        name="{{ $name }}" {{ $multipleAttribute }}
        previews="{{ $final ?? '' }}">
    @if($uploadedChooser)
        <div class="mx-auto mt-4 h-4 w-1/4 animate-pulse bg-gray-100" already_uploaded_loader></div>
        <div class="mt-4 hidden text-center" media_panel_toggler>
            <p class="cursor-pointer text-blue-400 hover:text-blue-600">
                {{ __('adminify.choose_already_uploaded')  }}
            </p>
        </div>
        @once
            <x-admin.already-uploaded-media-chooser/>
        @endonce
    @endif
</div>



