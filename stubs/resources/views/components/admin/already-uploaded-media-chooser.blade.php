@pushonce('scripts')
    @vite('resources/js/admin/already-uploaded-media-chooser.js')
@endpushonce
<div>
    <div class="fixed top-0 left-0 h-screen w-full bg-overlay-body z-999 p-10 hidden" overlay>
        <div class="w-full bg-white overflow-y-auto h-full rounded-lg relative media_modal " modal_white_card>
            <div class="text-center py-5">
                       <h1 class="text-lg capitalize">{{ __('adminify.media.chooser') }}</h1>
                <div class="absolute top-1 right-2 cursor-pointer p-1 group hover:bg-red-100 rounded-md cursor-pointer" id="close_btn">
                    <x-icons.cross class="group-hover:text-red-400"></x-icons.cross>
                </div>
            </div>
            <div class=""></div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-2 mx-auto px-4" image-grid-container></div>
        </div>
    </div>
</div>

