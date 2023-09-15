@props(['locale'])

@pushonce('scripts')
    @vite('resources/js/admin/already-uploaded-media-chooser.js')
@endpushonce
<div>
    <div class="fixed top-0 left-0 hidden h-screen w-full p-10 bg-overlay-body z-999" overlay>
        <div class="relative h-full w-full overflow-y-auto rounded-lg bg-white" modal_white_card>
            <div class="py-5 text-center">
                <h1 class="text-lg capitalize">{{ __('adminify.media.chooser') }}</h1>
                <div class="absolute top-1 right-2 cursor-pointer rounded-md p-1 group hover:bg-red-100"
                     id="close_btn">
                    <x-icons.cross class="group-hover:text-red-400"></x-icons.cross>
                </div>
            </div>
            <div class=""></div>
            <div class="mx-auto grid grid-cols-8 gap-2" image-grid-container></div>
        </div>
    </div>
</div>
