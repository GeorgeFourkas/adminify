<x-layouts.admin>
    @pushonce('scripts')
        @vite(['resources/js/admin/media-details.js', 'resources/js/admin/upload-new-media-modal.js'])
    @endpushonce
    <div class="flex w-full items-end justify-end px-5">
        <x-admin.primary-action-button as="button" id="upload_new_media" :text="__('adminify.media.action_button')"/>
    </div>
    <h1 class="text-center text-2xl font-semibold">{{ __('adminify.media.page_title') }}</h1>
    <div
        class="mt-1 grid w-full grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 place-content-center content-center gap-5 px-10">
        @foreach($media as $med)
            <div class="cursor-pointer rounded-lg hover:shadow-soft-2xl border border-gray-400" gallery_image
                 data-model="{{ json_encode($med) }}" data-route="{{ json_encode(route('media.destroy', $med)) }}">
                <img src="{{ $med->url }}" alt="media_not_found" class="h-full rounded-sm object-cover object-center">
            </div>
        @endforeach
    </div>
    @if(count($media) == 0)
        <div class="h-full items-center justify-center">
            <p class="text-center capitalize">{{ __('adminify.media.no_media_available') }}</p>
        </div>
    @endif
    <div class="mx-auto mt-10 flex w-1/3 items-center justify-between">
        {{ $media->links() }}
    </div>
    <x-admin.media-details-modal/>
    <x-admin.upload-media-modal/>
    <x-admin.delete-action-confirmation-modal/>
</x-layouts.admin>
