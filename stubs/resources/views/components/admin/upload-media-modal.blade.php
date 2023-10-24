@push('scripts')
    @vite('resources/js/admin/reload_page_on_media_upload.js')
@endpush
<div class="fixed top-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-999"
     id="upload_media_modal">
    <div class="w-11/12 md:w-10/12 lg:3/4 xl:w-1/2 rounded-lg bg-white px-6 py-3 overflow-auto">
        <h1 class="text-center capitalize font-semibold text-slate-800 font-xl">
            {{  __('adminify.media.upload_action') }}
        </h1>
        <form action="{{ route('upload.new.media') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-5">
                <x-filepond class="w-full h-full" multiple :uploaded-chooser="false" name="uploaded_file"/>
            </div>
        </form>
    </div>
</div>


