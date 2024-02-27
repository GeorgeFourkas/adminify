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
        <div class="h-[76px] w-full rounded-md bg-gray-100 animate-pulse " pond_loader>
            <div class="w-full h-[76px] flex items-center justify-center">
                <div class="w-56 h-2 bg-gray-200"></div>
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
        <div class="w-1/4 mx-auto h-4 bg-gray-100 animate-pulse mt-4" already_uploaded_loader></div>
        <div class="text-center mt-4 hidden" media_panel_toggler>
            <p class="text-blue-400 cursor-pointer hover:text-blue-600">
                {{ __('adminify.choose_already_uploaded')  }}
            </p>
        </div>
        @once
            <x-admin.already-uploaded-media-chooser/>
        @endonce
    @endif
</div>



