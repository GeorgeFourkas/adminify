@php
    use Illuminate\Support\Carbon;
@endphp
<div class="flex w-full flex-col lg:flex-row items-center justify-between px-3 py-2">
    <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft my-3 lg:my-0">
        <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg
                   rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center
                   font-normal text-slate-500 transition-all">
                <x-icons.calendar/>
        </span>
        <label for="{{$attributes->get('start-id')}}"></label>
        <input type="text" id="{{$attributes->get('start-id')}}"
               class="pl-9 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block
               min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3
               text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none
               focus:transition-shadow" placeholder="{{$attributes->get('start-date-placeholder')}}"/>
    </div>
    <span class="mx-4 hidden lg:block">To</span>
    <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft my-3 lg:my-0">
        <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg
                     rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center
                      font-normal text-slate-500 transition-all">
                <x-icons.calendar/>
        </span>
        <label for="{{$attributes->get('end-id')}}"></label>
        <input type="text" id="{{$attributes->get('end-id')}}"
               class="pl-9 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block
               min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3
               text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none
               focus:transition-shadow" placeholder=" {{$attributes->get('end-date-placeholder')}} "/>
    </div>
</div>
