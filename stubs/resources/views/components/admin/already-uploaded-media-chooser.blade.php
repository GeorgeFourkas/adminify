@props(['locale'])

@pushonce('scripts')
    @vite('resources/js/admin/already-update-media-chooser.js')
@endpushonce
<div>
    <div class="fixed top-0 left-0 h-screen w-full bg-overlay-body z-999 p-10 hidden" overlay>
        <div class="w-full bg-white overflow-y-auto h-full rounded-lg relative" modal_white_card>
            <div class="text-center py-5">
                <h1 class="text-lg ">{{ __('Choose Media') }}</h1>
                <div class="absolute top-1 right-2 cursor-pointer p-1 group hover:bg-red-100 rounded-md cursor-pointer" id="close_btn">
                    <x-icons.cross class="group-hover:text-red-400"></x-icons.cross>
                </div>
            </div>
            <div class=""></div>
            <div class="grid grid-cols-8 gap-2 mx-auto" image-grid-container></div>
        </div>
    </div>
</div>
