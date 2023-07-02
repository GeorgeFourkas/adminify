<x-layouts.admin>
    <x-slot:head>
        @vite(['resources/js/admin/media-details.js', 'resources/js/admin/upload-new-media-modal.js',  'resources/js/admin/dropzone.js', 'resources/js/admin/confirm-modal.js'])
    </x-slot:head>


    <div class="flex w-full items-end justify-end px-5">
        <button id="upload_new_media"
                class="px-5 py-2 text-sm gradient-app-theme text-white font-normal rounded-md mb-3 mt-5 cursor-pointer">
            {{__('Upload')}}
        </button>
    </div>
    <h1 class="text-center text-2xl font-semibold ">{{__('Media')}}</h1>

    <div class="grid grid-cols-8 gap-5 content-center place-content-center w-full px-10 mt-1">
        @foreach($media as $med)
            <div class="cursor-pointer rounded-lg hover:shadow-soft-2xl" gallery_image
                 data-model="{{json_encode($med)}}" data-route="{{ json_encode( route('media.destroy', $med) ) }}">
                <img src="{{$med->url}}" alt="media_not_found" class="h-full object-cover rounded-sm object-center">
            </div>
        @endforeach
    </div>

    @if(count($media) == 0)
        <div class="h-full items-center justify-center">
            <p class="text-center">{{ __('No Media Currently Uploaded') }}</p>
        </div>
    @endif

    <div class="w-1/3 mx-auto flex items-center justify-between mt-10 ">
        {{ $media->links() }}
    </div>
    <x-admin.media-details-modal></x-admin.media-details-modal>
    <x-admin.upload-media-modal></x-admin.upload-media-modal>
    <x-admin.delete-action-confirmation-modal></x-admin.delete-action-confirmation-modal>
</x-layouts.admin>
