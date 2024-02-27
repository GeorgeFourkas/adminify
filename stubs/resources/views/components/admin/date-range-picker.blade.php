@php  use Illuminate\Support\Carbon; @endphp
<div class="flex w-full max-w-full flex-col items-center justify-between px-3 py-2 lg:flex-row">
    <div class="relative my-3 flex w-full flex-wrap items-stretch rounded-lg transition-all ease-soft lg:my-0">
        <span
            class="absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 text-center text-sm font-normal text-slate-500 transition-all ease-soft leading-5.6 px-2.5">
            <x-icons.calendar/>
        </span>
        <label for="{{ $attributes->get('start-id') }}"></label>
        <x-text-input id="{{ $attributes->get('start-id') }}"
                      placeholder="{{ $attributes->get('start-date-placeholder') }}"
                      class="relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 pl-9 text-sm placeholder:text-gray-500 text-gray-700 transition-all ease-soft w-1/100 leading-5.6 focus:shadow-soft-primary-outline focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"/>
    </div>
    <span class="mx-4 hidden capitalize lg:block">{{ __('adminify.to') }}</span>
    <div class="relative my-3 flex w-full flex-wrap items-stretch rounded-lg transition-all ease-soft lg:my-0">
        <span
            class="absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 text-center text-sm font-normal text-slate-500 transition-all ease-soft leading-5.6 px-2.5">
            <x-icons.calendar/>
        </span>
        <label for="{{ $attributes->get('end-id') }}"></label>
        <x-text-input
            id="{{ $attributes->get('end-id') }}"
            placeholder="{{ $attributes->get('end-date-placeholder') }}"
            class="relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 pl-9 text-sm placeholder:text-gray-500 text-gray-700 transition-all ease-soft w-1/100 leading-5.6 focus:shadow-soft-primary-outline focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"/>
    </div>
</div>
