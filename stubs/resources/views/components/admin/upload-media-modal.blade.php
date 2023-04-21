<div class="min-h-screen w-full bg-overlay-body flex items-center justify-center fixed top-0 left-0 z-999 hidden"
     id="upload_media_modal">
    <div class="bg-white rounded-lg w-1/2 px-6 py-3">
        <h1 class="text-center text-slate-800 font-xl font-semibold">
            {{  __('Upload Media') }}
        </h1>
        <form action="{{ route('upload.new.media') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-5 flex max-h-72 w-full items-center justify-center">
                <x-admin.dropzone
                    class="w-full h-64"
                    name="uploaded_file"
                    acceptedFileTypes="image/*"
                    id=""
                    :title="__('Post Featured Image')"
                    :actionText=" __('Click To Upload')"
                    :description="__('or drag and drop')"
                    :fileTypesText="__('SVG, PNG, JPG or GIF')"
                    :enable-already-uploaded="false"
                />
            </div>

            <div class="w-full flex items-center justify-center">
                <button id="upload_new_media"
                        class="px-5 py-2 text-sm gradient-app-theme text-white font-normal rounded-md mb-10 mt-5 cursor-pointer">
                    {{__('Submit')}}
                </button>
            </div>
        </form>
    </div>
</div>

