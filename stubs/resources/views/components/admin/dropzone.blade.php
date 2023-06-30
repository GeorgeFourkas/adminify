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
        'enableAlreadyUploaded' => true
    ]
)
@pushonce('scripts')
    @vite('resources/js/admin/dropzone.js')
@endpushonce

<div class="dropzone-handler w-full" data-children_id="{{$id}}" dropzone>
    <label for="dropzone-file-{{ $id }}" id="preview-{{ $id }}"
           data-asset="{{$previewUrl ?? ''}}"
        {!!
                $attributes->merge([
                    'class' => 'relative flex cursor-pointer flex-col items-center justify-center rounded-lg
                                border-2 border-dashed border-gray-300 bg-gray-50 bg-cover bg-center hover:bg-gray-100 capitalize'
                ])
        !!}>
    <span class="absolute top-0 right-0 hidden rounded-tr-lg z-990 hover:bg-red-300" id="removeImage-{{$id}}" dropzone_remove_btn>
        <x-icons.cross></x-icons.cross>
     </span>
        <div class="flex flex-col items-center justify-center pt-5 pb-6"
             id="labels-{{$id}}">
            <x-icons.cloud></x-icons.cloud>
            <p class="mb-2 text-center text-sm text-gray-500 dark:text-gray-400"
               id="label-text-1-{{$id}}">
            <span class="block underline">
                {{$title ?? ''}}
            </span>
                <br>
                <span class="drop-shadow-2xl">
                {{$actionText ?? ''}}
            </span>
                {{$description ?? ''}}
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                {{$fileTypesText ?? ''}}
            </p>
        </div>
        <input id="dropzone-file-{{$id}}" name="{{$name}}"
               type="file" accept="{{$acceptedFileTypes}}" class="hidden"
        />
    </label>
    @if($enableAlreadyUploaded)
        <div class="text-center mt-4" media_panel_toggler>
            <p class="text-blue-400 cursor-pointer hover:text-blue-600">
                {{ __('Choose an already uploaded file')  }}
            </p>
        </div>
    @endif
</div>

@once
    <x-admin.already-uploaded-media-chooser></x-admin.already-uploaded-media-chooser>
@endonce



