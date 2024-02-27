@props([
    'source' => ''
])

<div class="mt-0 w-1/4 max-w-full flex-none py-4 pr-3 pl-0">
    <div class="mb-2 flex">
        <div
            class="mr-2 flex h-5 w-5 items-center justify-center rounded bg-center fill-current text-center text-neutral-900 shadow-soft-2xl b">
            {{ $slot }}
        </div>
        <p class="mt-1 mb-0 hidden text-xs font-semibold leading-tight lg:inline-block">
            {{ __('adminify.users.page_title') }}
        </p>
    </div>
    <h4 class="font-bold" id="session-source-{{ $source }}"></h4>
    <div class="flex w-3/4 overflow-visible rounded-lg bg-gray-200 text-xs h-0.75">
        <div
            class="-ml-px flex w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all duration-600 ease-soft -mt-0.38 h-1.5"
            role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
