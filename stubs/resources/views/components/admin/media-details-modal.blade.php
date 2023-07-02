<div
    class="min-h-screen w-full fixed top-0 left-0 bg-overlay-body z-999 px-10 flex flex-row items-center justify-center hidden"
    id="media_details_modal">
    <div
        class="relative bg-white rounded-lg w-11/12 lg:w-2/3 max-h-[50rem] flex flex-col lg:flex-row items-start justify-center w-full min-h-full space-x-3">
        <div class="rounded-l-lg w-full lg:w-1/2 ">
            <img src="" class="w-full  overflow-y-hidden rounded-l-lg" alt=""
                 id="preview">
        </div>
        <div class="rounded-r-lg w-full lg:w-1/2 h-full text-sm py-5 lg:py-0">
            <div class="my-4">
                <h1 class="text-center font-semibold text-xl">{{ __('File Information') }}</h1>
            </div>
            <h1 class="capitalize">
                {{ __('uploaded by') }}:
                <span class="text-blue-400" id="uploaded_by"></span>
            </h1>
            <h1>
                {{ __('Uploaded At') }}:
                <span
                    id="uploaded_at"> {{ \Illuminate\Support\Carbon::now()->subWeeks(rand(1,9))->diffForHumans() }} </span>
            </h1>
            <h1 class="capitalize">
                {{ __('original file name') }}:
                <span id="original_file_name" class="text-blue-400"></span>
            </h1>
            <h1>
                {{ __('File Extension') }}:
                <span id="file_extension" class="text-blue-400"></span>
            </h1>
            <h1>
                {{ __('File Size') }}:
                <span id="size" class="text-blue-400"></span>
                <span class="text-xs text-blue-400 uppercase text-sm">KB</span>
            </h1>
            <h1 class="capitalize">
                {{ __('aspect ratio') }}:
                <span id="aspect_ratio" class="text-blue-400"></span>
            </h1>
            <h1 class="capitalize">
                {{ __('width') }}:
                <span id="width" class="text-blue-400"></span>
            </h1>
            <h1 class="capitalize">
                {{ __('height') }}:
                <span id="height" class="text-blue-400"></span>
            </h1>
            <h1 class="break-words capitalize">
                {{ __('file url') }}:
                <span class="text-blue-400 cursor-pointer hover:text-blue-300 underline" id="url"></span>
            </h1>
            <div class="absolute bottom-2 right-2 ">
                <form action="" deletion-form remove_media_btn method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 bg-red-500 text-white hover:bg-red-300 rounded-lg">
                        {{ __('Remove') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
