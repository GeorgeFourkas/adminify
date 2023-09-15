<div class="fixed top-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-999"
     id="upload_media_modal">
    <div class="w-1/2 rounded-lg bg-white px-6 py-3">
        <h1 class="text-center font-semibold text-slate-800 font-xl">
            {{  __('Upload Media') }}
        </h1>
        <form action="{{ route('upload.new.media') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                <x-admin.dropzone
                    class="h-64 w-full"
                    name="uploaded_file"
                    acceptedFileTypes="image/*"
                    id=""
                    :title="__('Featured Image')"
                    :actionText=" __('Click To Upload')"
                    :description="__('or drag and drop')"
                    :fileTypesText="__('SVG, PNG, JPG or GIF')"
                    :enable-already-uploaded="false"
                />
            </div>

            <div class="flex w-full items-center justify-center">
                <button id="upload_new_media"
                        class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
                    {{__('Submit')}}
                </button>
            </div>
        </form>
    </div>
</div>

