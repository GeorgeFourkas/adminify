<x-layouts.admin>
    <div class=" w-10/12 mx-auto flex items-start justify-start space-x-14">
        <div class="w-2/3  flex-none px-3">
            <div
                class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
                <div class="flex w-full items-center justify-between">
                    <div
                        class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                        <h6>{{__('Categories')}}</h6>
                    </div>
                    <div
                        class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                        <a href="#"
                           class="p-3 gradient-app-theme text-white shadow-soft-2xl capitalize
                                text-xs rounded-lg hover:bg-gradient-to-l hover:from-white hover:to-white
                                hover:text-paragraphGray transition duration-300">
                            <x-icons.add></x-icons.add>
                            {{__('Create Categories')}}
                        </a>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="overflow-x-auto p-0">
                        <table class="mb-0 w-full items-center border-gray-200 align-top text-slate-500">
                            <thead class="align-bottom">
                            <tr>
                                <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                    {{__('Title')}}
                                </th>
                                <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                    {{__('Parent id')}}
                                </th>
                                <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                    {{__('Created at')}}
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs  leading-tight">Lorem</p>

                                </td>
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs  leading-tight">1</p>

                                </td>
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs  leading-tight">27-03-2022</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <x-admin.posts.delete-post-modal></x-admin.posts.delete-post-modal>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-layouts.admin>
