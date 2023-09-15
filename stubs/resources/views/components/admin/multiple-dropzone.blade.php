@props(
    [
        'name',
        'id' => '',
        'mainModel',
        'title' => '',
        'previewModels' => [],
        'actionText' => '',
        'description' => '',
        'fileTypesText' => '',
        'acceptedFileTypes' => '',
        'enableAlreadyUploaded' => true,
        'alreadyUploadedFieldName' => '',
        'detachMediaFieldName' => '',
    ]
)
@php
    if ($id == ''){
        $id = str()->random(30);
    }
@endphp

@pushonce('scripts')
    @vite('resources/js/admin/dropzone.js')
@endpushonce

<div class="w-full dropzone-handler" data-children_id="{{ $id }}" dropzone>

    <label for="{{ $id }}" id="preview-{{ $id }}"
           data-asset="{{ $previewUrl ?? '' }}"
        {!!
                $attributes->merge([
                    'class' => 'relative flex cursor-pointer flex-col items-center justify-center rounded-lg
                                border-2 border-dashed border-gray-300 bg-gray-50 bg-cover bg-center hover:bg-gray-100 '
                ])
        !!}>
        <div class="grid w-full grid-cols-7 gap-2 overflow-y-auto p-5 z-999" uploaded_media_gallery>

            @if($previewModels)
                @foreach($previewModels as $model)
                    <div class="relative group" already_uploaded_media data-model="{{ $model->toJson() }}">
                        <img src="{{ $model->url }}" class="" alt="">
                        <div
                            class="w-full h-full opacity-60 bg-[rgba(0,0,0,0.9)] hidden group-hover:block absolute top-0 left-0">
                            <div class="flex h-full items-center justify-center">
                                <div class="rounded-full p-3 hover:bg-gray-400">
                                    <x-icons.cross></x-icons.cross>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="relative hidden group" already_uploaded_media>
                    <img src="" class="h-full w-full object-cover" alt="">
                    <div
                        class="w-full h-full opacity-60 bg-[rgba(0,0,0,0.9)] hidden group-hover:block absolute top-0 left-0">
                        <div class="flex h-full items-center justify-center">
                            <div class="rounded-full p-3 hover:bg-gray-400">
                                <x-icons.cross></x-icons.cross>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="flex hidden flex-col items-center justify-center pt-5 pb-6" labels id="labels-{{ $id }}">
            <x-icons.cloud></x-icons.cloud>
            <p class="mb-2 text-center text-sm text-gray-500 dark:text-gray-400"
               id="label-text-1-{{ $id }}" first_label_text>
            <span class="block underline">
                {{ $title ?? '' }}
            </span>
                <br>
                <span class="drop-shadow-2xl">
                {{  $actionText ?? '' }}
            </span>
                {{ $description ?? '' }}
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                {{ $fileTypesText ?? '' }}
            </p>
        </div>
        <input id="{{$id}}" name="{{ $name .'[files_to_upload][]' }}" type="file" accept="{{ $acceptedFileTypes }}"
               class="hidden" multiple disabled
            {{ ($alreadyUploadedFieldName !== '') ? "already_uploaded_media_field_name=$alreadyUploadedFieldName" : 'already_uploaded_media_field_name='. $name .'[already_uploaded][]' }}
            {{ ($detachMediaFieldName !== '') ?  "detach_media_field_name=$detachMediaFieldName " : "detach_media_field_name=".$name.'[detach][]'}}
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



