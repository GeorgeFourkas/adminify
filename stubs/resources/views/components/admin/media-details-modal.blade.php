<div
    class="min-h-screen w-full fixed top-0 left-0 bg-overlay-body z-999 px-10 flex flex-row items-center justify-center hidden"
    id="media_details_modal">
    <div
        class="relative bg-white rounded-lg w-11/12 lg:w-2/3 max-h-[50rem] flex flex-col lg:flex-row items-start justify-center w-full min-h-full space-x-3">
        <div class="rounded-l-lg w-full lg:w-1/2 h-[50rem] ">
            <img src="" class="w-full h-[50rem]  overflow-y-hidden rounded-l-lg" alt=""
                 id="preview">
        </div>
        <div class="rounded-r-lg w-full lg:w-1/2 h-full text-sm py-5 lg:py-0">
            <div class="my-4">
                <h1 class="text-center font-semibold text-xl">{{ __('File Information') }}</h1>
            </div>
            <h1>Uploaded By: <span class="text-blue-400" id="uploaded_by"></span></h1>
            <h1>
                Uploaded At:
                <span
                    id="uploaded_at"> {{ \Illuminate\Support\Carbon::now()->subWeeks(rand(1,9))->diffForHumans() }} </span>
            </h1>
            <h1 class="">Original File Name: <span id="original_file_name" class="text-blue-400 "></span></h1>
            <h1>File Extension: <span id="file_extension" class="text-blue-400"></span></h1>
            <h1>File Size: <span id="size" class="text-blue-400"></span><span
                    class="text-xs text-blue-400 uppercase text-sm">KB</span></h1>
            <h1>Aspect Ratio: <span id="aspect_ratio" class="text-blue-400"></span></h1>
            <h1>Width: <span id="width" class="text-blue-400"></span></h1>
            <h1>Height: <span id="height" class="text-blue-400"></span></h1>
            <h1 class="break-words">File url: <span class="text-blue-400 cursor-pointer hover:text-blue-300 underline"
                                                    id="url"></span></h1>

            <div class="mt-3">
                <h1 class="text-center font-semibold text-xl">{{ __('Edit Information') }}</h1>
            </div>
            <form action="">
                <div class="flex items-center justify-center space-x-4 px-4 mt-4">
                    <div class="w-1/2">
                        <x-input-label value="Width"></x-input-label>
                        <x-text-input label="Width" value="670"></x-text-input>
                    </div>
                    <div class="w-1/2">
                        <x-input-label value="Height"></x-input-label>
                        <x-text-input label="Height" value="670"></x-text-input>
                    </div>
                </div>
                <div class="w-full flex items-center justify-center">
                    <input
                        class="px-2 py-1 text-sm gradient-app-theme text-white font-normal rounded-md mb-10 mt-5 cursor-pointer"
                        type="submit" value="{{ __('Resize') }}">
                </div>
            </form>
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
