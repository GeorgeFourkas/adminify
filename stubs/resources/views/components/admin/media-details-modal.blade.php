<div
    class="fixed top-0 left-0 flex hidden min-h-screen w-full flex-row items-center justify-center px-10 bg-overlay-body z-999"
    id="media_details_modal">
    <div
        class="relative flex min-h-full w-11/12 w-full flex-col items-start justify-center rounded-lg bg-white max-h-[50rem] space-x-3 lg:w-2/3 lg:flex-row">
        <div class="w-full rounded-l-lg lg:w-1/2">
            <img src="" class="w-full overflow-y-hidden rounded-l-lg" alt="" id="preview">
        </div>
        <div class="h-full w-full rounded-r-lg py-5 text-sm lg:w-1/2 lg:py-0">
            <div class="my-4">
                <h1 class="text-center text-xl font-semibold">{{ __('File Information') }}</h1>
            </div>
            <h1 class="capitalize">
                {{ __('adminify.media.uploaded_by') }}:
                <span class="text-blue-400" id="uploaded_by"></span>
            </h1>
            <h1>
                {{ __('adminify.media.uploaded_at') }}:
                <span id="uploaded_at"></span>
            </h1>
            <h1 class="capitalize">
                {{ __('adminify.media.original_file_name') }}:
                <span id="original_file_name" class="text-blue-400"></span>
            </h1>
            <h1>
                {{ __('adminify.media.file_extension') }}:
                <span id="file_extension" class="text-blue-400"></span>
            </h1>
            <h1>
                {{ __('adminify.media.file_size') }}:
                <span id="size" class="text-blue-400"></span>
                <span class="text-xs text-sm uppercase text-blue-400">KB</span>
            </h1>
            <h1 class="capitalize">
                {{ __('adminify.media.aspect_ratio') }}:
                <span id="aspect_ratio" class="text-blue-400"></span>
            </h1>
            <h1 class="capitalize">
                {{ __('adminify.media.width') }}:
                <span id="width" class="text-blue-400"></span>
            </h1>
            <h1 class="capitalize">
                {{ __('adminify.media.height') }}:
                <span id="height" class="text-blue-400"></span>
            </h1>
            <h1 class="break-words capitalize">
                {{ __('adminify.media.file_url') }}:
                <span class="cursor-pointer text-blue-400 underline hover:text-blue-300" id="url"></span>
            </h1>
            <div class="absolute right-2 bottom-2">
                <form action="" deletion-form remove_media_btn method="POST">
                    @csrf @method('DELETE')
                    <button class="rounded-lg bg-red-500 p-2 capitalize text-white hover:bg-red-300">
                        {{ __('adminify.media.remove_btn') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
