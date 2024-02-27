@pushonce('scripts')
    @vite('resources/js/admin/rich-editor.js')
@endpushonce
@props([
    'value' => '',
    'name' => '',
])


<div class="w-full" ckeditor>
    <div class="my-1 w-full animate-pulse rounded-lg bg-gray-200 h-[400px]" ckeditor_loader>
        <div class="flex h-10 items-center border-b border-gray-300 py-7">
            <div class="flex h-10 items-center justify-between border-r border-r-gray-300 px-2 w-[13%]">
                <div class="h-3 w-3/5 bg-gray-400"></div>
                <div class="h-2 w-1/12 bg-gray-400"></div>
            </div>
            <div class="flex h-10 items-center justify-between border-r border-r-gray-300 px-2 w-[18%]">
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
            </div>
            <div class="flex h-10 items-center justify-between border-r border-r-gray-300 px-2 w-[17%]">
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
            </div>
            <div class="flex h-10 items-center justify-between px-2 w-[20%]">
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
                <div class="h-7 w-6 rounded-lg bg-gray-300"></div>
            </div>
        </div>
        <div class="flex w-full items-center justify-center h-[390px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="h-6 w-6 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
            </svg>
        </div>
    </div>
    <textarea class="hidden w-full" {{ $attributes->merge(['name' => $name]) }}>{{ $value }}</textarea>
</div>
