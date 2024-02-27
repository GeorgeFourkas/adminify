@php  use Illuminate\Support\Carbon; @endphp
<div class="flex w-full flex-col items-center justify-between px-3 py-2 lg:flex-row max-w-full">
    <div class="relative my-3 flex w-full flex-wrap items-stretch rounded-lg transition-all ease-soft lg:my-0">
        <span
            class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
            <x-icons.calendar/>
        </span>
        <label for="{{ $attributes->get('start-id') }}"></label>
        <x-text-input id="{{ $attributes->get('start-id') }}" placeholder="{{ $attributes->get('start-date-placeholder') }}"
            class="pl-9 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"/>
    </div>
    <span class="mx-4 hidden lg:block capitalize">{{ __('adminify.to') }}</span>
    <div class="relative my-3 flex w-full flex-wrap items-stretch rounded-lg transition-all ease-soft lg:my-0">
        <span
            class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
            <x-icons.calendar/>
        </span>
        <label for="{{ $attributes->get('end-id') }}"></label>
        <x-text-input
            id="{{ $attributes->get('end-id') }}"
            placeholder="{{ $attributes->get('end-date-placeholder') }}"
            class="pl-9 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"/>
    </div>
</div>
