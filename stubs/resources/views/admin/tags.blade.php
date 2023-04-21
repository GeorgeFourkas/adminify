<x-layouts.admin>
    <x-slot:head>
        @vite(['resources/js/admin/tabs.js','resources/js/admin/tag-modal.js', 'resources/js/flash-timeout.js', 'resources/js/admin/confirm-modal.js'])
    </x-slot:head>
    <div class="w-11/12 lg:w-2/3 mx-auto lg:mx-0 flex-none px-3">
        <div
            class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg mx-4">
            @if(Session::has('success'))
                <div
                    class="mx-auto flex h-10 w-full items-center justify-center rounded-t-lg bg-lime-500 px-6 text-white"
                    id="flash-container">
                    <p class="font-light">{{Session::get('success')}}</p>
                </div>
            @endif
            <div class="flex w-full items-center justify-between">
                <div
                    class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                    <h6>{{__('Tags')}}</h6>
                </div>
                <div
                    class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                    <button id="create-tag"
                            class="p-3 gradient-app-theme text-white shadow-soft-2xl capitalize
                                text-xs rounded-lg hover:bg-gradient-to-l hover:from-white hover:to-white
                                hover:text-paragraphGray transition duration-300">
                        <x-icons.add></x-icons.add>
                        {{__('Create Tag')}}
                    </button>
                </div>
            </div>

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="overflow-x-auto p-0">
                    <table class="mb-0 w-full items-center border-gray-200 align-top text-slate-500">
                        <thead class="align-bottom">
                        <tr>
                            <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-start align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                {{__('Name')}}
                            </th>
                            <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-start align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                {{__('Created At')}}
                            </th>
                            <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-start align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr class="cursor-pointer hover:bg-gray-50" data-model="{{json_encode($tag)}}" modalable
                                data-route="{{route('tags.update', $tag)}}">
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs leading-tight font-semibold">{{$tag->name}}</p>
                                </td>
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs font-light leading-tight">{{\Illuminate\Support\Carbon::parse($tag->created_at)->format('d-m-Y')}}</p>
                                </td>
                                <td>
                                    <form action="{{ route('tags.delete', $tag) }}" method="POST" deletion-form>
                                        @method('DELETE')
                                        <button tabindex="-1"
                                                class="flex w-full w-12 cursor-pointer items-center justify-center rounded-md p-2 group hover:bg-red-500">
                                            <x-icons.trash></x-icons.trash>
                                        </button>
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$tags->links()}}
    </div>

    <div
        class="fixed top-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-999"
        id="modal-overlay" data-updateTitle="{{__('Edit Tag')}}" data-createTitle="{{__('Create Tag')}}">

        <div class="w-11/12 lg:w-1/3 rounded-lg bg-white px-5 py-2 ">
            <div class="flex items-center justify-center w-full relative">
                <div class="w-10 h-10 gradient-app-theme absolute -mt-5 rounded-full">
                    <div class="flex items-center justify-center w-full h-full">
                        <x-icons.taxonomies></x-icons.taxonomies>
                    </div>
                </div>
            </div>


            <h1 class="my-5 text-center text-xl font-semibold" id="modal-title"></h1>
            <ul class=" {{count($locales) > 1 ? '' : 'hidden'}} rounded-lg text-center text-sm font-medium text-gray-500 divide-x divide-gray-200 flex flex-row flex-wrap items-center justify-center min-h-full"
                id="tabExample" role="tablist" data-locales="{{json_encode($locales)}}">
                <x-admin.language-tabs-header :locales="$locales"/>

            </ul>
            <form action="{{route('tags.store')}}" method="POST" id="tag-form">
                @csrf
                @foreach($locales as $key => $locale)
                    <div class="mt-10 hidden w-full rounded-lg"
                         id="profile-example-{{$locale}}"
                         role="tabpanel" aria-labelledby="profile-tab-example-{{$locale}}">
                        <div class="flex items-center justify-center">
                            {{--                            <x-admin.text-field label="{{__('name')}}" name="{{$locale}}[name]" id="{{$locale}}"/>--}}
                            <x-input-label
                                for="title"
                                :value="__('Title')"></x-input-label>
                            <x-text-input
                                id="{{$locale}}"
                                type="text"
                                class="mt-1 mx-2 block w-full"
                                name="{{$locale}}[name]"
                                :value="old($locale.'.title')">
                            </x-text-input>
                        </div>
                    </div>
                @endforeach
                <div class="flex items-center justify-center">
                    <input
                        class="mt-5 mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme"
                        type="submit" value="{{__('Submit')}}">
                </div>
            </form>
        </div>
    </div>
    <x-admin.posts.delete-post-modal></x-admin.posts.delete-post-modal>
</x-layouts.admin>
