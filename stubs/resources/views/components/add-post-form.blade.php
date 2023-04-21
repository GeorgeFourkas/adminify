<div class="mt-10 hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="profile-example"
     role="tabpanel"
     aria-labelledby="profile-tab-example">
    <div class="flex w-full items-center justify-center">
        <div class="flex w-1/2 items-center justify-center">
            <label for="large-input"
                   class="mb-2 block text-sm font-medium text-gray-900">{{__('Title')}}
            </label>
            <input type="text" id="title" name="title[gr]"
                   class="block w-full p-2 mx-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                          sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700">
        </div>
        <div class="mx-4 flex w-1/2 items-center justify-center">
            <label for="large-input"
                   class="mb-2 block text-sm font-medium text-gray-900">{{__('Slug')}}
            </label>
            <input type="text" id="slug" disabled name="slug['gr']"
                   class="block w-full p-2 mx-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                          sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700">
        </div>
    </div>
    <div class="mt-10 flex w-full flex-col items-start justify-center" id="rich-container">
        <label class="my-2 text-sm text-black">{{__('Post Body')}}
        </label>
        <textarea id="body-gr" cols="30" rows="10" name="body['gr']"></textarea>
    </div>
    <div class="mt-5 flex max-h-72 w-full items-center justify-center">
        <label for="dropzone-file" id="preview"
               class="relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 bg-cover bg-center hover:bg-gray-100">
                            <span class="absolute top-0 right-0 hidden rounded-tr-lg z-990 hover:bg-red-300"
                                  id="removeImage">
                                <x-icons.cross></x-icons.cross>
                            </span>
            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="labels">
                <x-icons.cloud></x-icons.cloud>
                <p class="mb-2 text-center text-sm text-gray-500 dark:text-gray-400" id="label-text-1">
                    <span class="block underline">{{__('Post Featured Image')}}
                    </span>
                    <br>
                    <span class="drop-shadow-2xl">{{__('Click to upload')}}
                    </span>
                    {{__('or drag and drop')}}

                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{__('SVG, PNG, JPG or GIF (MAX. 800x400px)')}}

                </p>
            </div>
            <input id="dropzone-file" name="featured_image['{{$locale}}']" type="file" accept="image/*"
                   class="hidden"/>
        </label>
    </div>
</div>
