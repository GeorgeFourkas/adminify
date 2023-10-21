@pushonce('scripts')
    @vite('resources/js/admin/rich-editor.js')
@endpushonce

@props([
    'value' => '',
    'name' => '',
])


<div class="w-full" ckeditor>
    <div class="bg-gray-200 w-full h-[400px] animate-pulse rounded-lg my-1" ckeditor_loader>
        <div class="h-10 border-b border-gray-300 flex items-center py-7">
            <div class="w-[13%] h-10 border-r border-r-gray-300 px-2 flex items-center justify-between">
                <div class="h-3 w-3/5 bg-gray-400"></div>
                <div class="h-2 w-1/12 bg-gray-400"></div>
            </div>
            <div class="w-[18%] h-10 border-r border-r-gray-300 flex items-center justify-between px-2">
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
            </div>
            <div class="w-[17%] h-10  border-r border-r-gray-300 flex items-center justify-between px-2">
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
            </div>
            <div class="w-[20%] h-10   flex items-center justify-between px-2">
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
                <div class="w-6 h-7 bg-gray-300 rounded-lg"></div>
            </div>
        </div>
        <div class="h-[390px] w-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </div>
    </div>

    <textarea class="w-full hidden" {{ $attributes->merge(['name' => $name]) }}>{{ $value }}</textarea>
</div>
