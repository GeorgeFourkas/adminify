@vite('resources/js/admin/dynamic-meta-fields.js')
@props(['locale'])
<div class=" w-11/12 mx-auto mt-5" meta_fields_container data-tab="{{$locale}}"
     data-meta_name_label="{{ __('Meta Tag Name') }}" data-meta_value_label="{{ __('Meta Tag Value') }}">
    {{--    <div class="flex items-start justify-center space-x-4 hidden" meta_fields_row>--}}
    {{--        <div class="w-5/12">--}}
    {{--            <x-input-label--}}
    {{--                :value="__('Meta Field Name')"--}}
    {{--            />--}}
    {{--            <x-text-input--}}
    {{--                type="text"--}}
    {{--                class="mt-1 mx-2 block w-full"--}}
    {{--                name="{{$locale}}[meta][name][]"--}}
    {{--            />--}}
    {{--        </div>--}}
    {{--        <div class="w-5/12">--}}
    {{--            <x-input-label--}}
    {{--                for="title"--}}
    {{--                :value="__('Meta Field Value')"--}}
    {{--            />--}}
    {{--            <x-text-input--}}
    {{--                id="title"--}}
    {{--                type="text"--}}
    {{--                class="mt-1 mx-2 block w-full"--}}
    {{--                name="{{$locale}}[meta][value][]"--}}
    {{--            />--}}
    {{--        </div>--}}
    {{--        <div class="flex flex-col items-center justify-center cursor-pointer hover:bg-red-300 p-0.5 group h-full"--}}
    {{--             delete-meta>--}}
    {{--            <x-icons.cross class="group-hover:text-white"></x-icons.cross>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div>


