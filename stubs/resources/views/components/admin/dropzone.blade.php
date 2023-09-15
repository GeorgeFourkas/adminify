@props(
    [
        'id' => '',
        'name',
        'title' => '',
        'previewUrl' => '',
        'actionText' => '',
        'description' => '',
        'fileTypesText' => '',
        'acceptedFileTypes' => '',
        'inputClasses' => '',
        'enableAlreadyUploaded' => true
    ]
)

@pushonce('scripts')
    @vite('resources/js/admin/dropzone.js')
@endpushonce

@php
    if ($id == ''){
        $id = random_bytes(10);
    }
@endphp

<div class="flex w-full flex-col items-center justify-center dropzone-handler" dropzone>
    <label for="{{ $id }}" id="preview-{{ $id }}"
           data-asset="{{$previewUrl ?? ''}}"
        {!!
                $attributes->merge([
                    'class' => 'relative flex cursor-pointer flex-col items-center justify-center rounded-lg
                                border-2 border-dashed border-gray-300 bg-gray-50 bg-cover bg-center hover:bg-gray-100 capitalize'
                ])
        !!}>
        {{-- Delete Button--}}
        <span class="absolute right-1 hidden rounded-md top-1.5 z-990 group hover:bg-red-200"
              dropzone_remove_btn>
        <x-icons.cross class="group-hover:text-white"></x-icons.cross>
     </span>

        <div class="flex flex-col items-center justify-center pt-5 pb-6"
             id="labels-{{ $id }}">
            <x-icons.cloud></x-icons.cloud>
            <p class="mb-2 text-center text-sm text-gray-500 dark:text-gray-400"
               id="label-text-1-{{$id}}">
            <span class="block underline">
                {{$title ?? ''}}
            </span>
                <br>
                <span class="drop-shadow-2xl">
                {{ $actionText ?? '' }}
            </span>
                {{ $description ?? '' }}
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                {{ $fileTypesText ?? '' }}
            </p>
        </div>
        <input id="{{ $id }}" name="{{ $name }}"
               type="file" accept="{{ $acceptedFileTypes }}" class="hidden"
        />
    </label>
    @if($enableAlreadyUploaded)
        <div class="mt-4 text-center" media_panel_toggler>
            <p class="cursor-pointer text-blue-400 hover:text-blue-600">
                {{ __('Choose an already uploaded file')  }}
            </p>
        </div>
    @endif
</div>

@once
    <x-admin.already-uploaded-media-chooser></x-admin.already-uploaded-media-chooser>
@endonce



