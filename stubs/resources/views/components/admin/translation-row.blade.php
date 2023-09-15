@props(['content', 'parentKey', 'original' => '', 'originalKey'])

@if(!is_array($content))
    <div class="w-11/12">
        <label for="message"
               class="mb-2 flex items-center justify-start text-sm font-medium text-gray-900 space-x-4">
            <p>Original Text</p>

            <img src="{{ asset("vendor/blade-flags/language-en.svg") }}" class="h-6 w-6">
        </label>
        <div id="message" readonly
             class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500">
            {!!  \App\Services\StringSpanWrapper::createSpan($original)  !!}
        </div>
    </div>
    <div class="flex w-11/12 items-center justify-center">
        <div class="m-0 w-11/12">
            <label
                class="mb-2 flex items-center justify-start text-sm font-medium text-gray-900 space-x-4">
                <p>Translated Text</p>
                <img src="{{ asset("vendor/blade-flags/language-el.svg") }}" class="h-6 w-6">
            </label>
            <div class="my-1" parameters_grid></div>
            <div contenteditable
                 parameters="{{ \App\Services\StringSpanWrapper::getJsonizedParams($content) }}"
                 class="block w-full resize-none rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500">
                {!!  \App\Services\StringSpanWrapper::createSpan($content) !!}
                <input type="hidden" name="php_translations[{{ $parentKey }}]" value="{{ $content }}">
            </div>
        </div>
    </div>
@else
    @foreach($content as $index => $subContent)
        <x-admin.translation-row :content="$subContent" parentKey="{{ $parentKey }}[{{  $index }}]"  :original="$original[$index] ?? ''" />
    @endforeach
@endif
