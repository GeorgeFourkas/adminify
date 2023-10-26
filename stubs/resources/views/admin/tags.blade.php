@php use Illuminate\Support\Carbon; @endphp
<x-layouts.admin>
    @pushonce('scripts')
        @vite('resources/js/admin/tag-modal.js')
    @endpushonce
    <x-admin.session-flash/>
    <div class="mx-auto w-11/12 flex-none px-3 lg:mx-0 lg:w-2/3">
        <div
            class="relative mx-4 mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
            <div class="flex w-full items-center justify-between">
                <div
                    class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 capitalize border-b-solid">
                    <h6>{{ __('adminify.tags.page_title') }}</h6>
                </div>
                <div class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                    <x-admin.primary-action-button as="link" id="create-tag" class="cursor-pointer"
                                                   :text="__('adminify.tags.action_button_text')">
                        <x-icons.add/>
                    </x-admin.primary-action-button>
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="overflow-x-auto p-0">
                    <table class="mb-0 w-full items-center border-gray-200 align-top text-slate-500">
                        <thead class="align-bottom">
                        <tr>
                            <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-start align-middle font-bold uppercase capitalize text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                {{  __('adminify.tags.name_column') }}
                            </th>
                            <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-start align-middle font-bold uppercase capitalize text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                {{  __('adminify.tags.created_at_column') }}
                            </th>
                            <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-start align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr class="cursor-pointer hover:bg-gray-50" data-model="{{ json_encode($tag) }}" modalable
                                data-route="{{ route('tags.update', $tag) }}">
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $tag->name }}</p>
                                </td>
                                <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                    <p class="mb-0 text-xs font-light leading-tight">{{ Carbon::parse($tag->created_at)->format('d-m-Y') }}</p>
                                </td>
                                <td class="align-left">
                                    <form action="{{ route('tags.delete', $tag) }}" method="POST" deletion-form>
                                        @method('DELETE') @csrf
                                        <button
                                            class="flex w-12 cursor-pointer items-center justify-center rounded-md p-2 group hover:bg-red-500">
                                            <x-icons.trash/>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $tags->links() }}
    </div>
    <div class="fixed top-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-999"
         id="modal-overlay" data-updateTitle="{{ __('adminify.tags.edit_tag_modal_title') }}"
         data-createTitle="{{ __('adminify.tags.create_tag_modal_title') }}">
        <div class="w-11/12 rounded-lg bg-white px-5 py-5 lg:w-1/3">
            <div class="relative flex w-full items-center justify-center">
                <div class="absolute -mt-5 h-10 w-10 rounded-full gradient-app-theme">
                    <div class="flex h-full w-full items-center justify-center">
                        <x-icons.taxonomies/>
                    </div>
                </div>
            </div>
            <h1 class="my-5 text-center text-xl font-semibold" id="modal-title"></h1>
            <x-admin.language-tabs-header :locales="$locales"/>
            <form action="{{ route('tags.store') }}" method="POST" id="tag-form">
                @csrf
                @foreach($locales as $key => $locale)
                    <div class="mt-10 hidden w-full rounded-lg" id="tab_{{ $locale }}">
                        <x-input-label class="capitalize" for="{{ $locale }}"
                                       :value="__('adminify.tags.tag_name_field') "/>
                        <x-text-input id="tag_name_{{ $locale }}" type="text" class="mx-2 mt-1 block w-11/12"
                                      name="{{ $locale }}[name]" :value="old( $locale .'.title')"/>
                    </div>
                @endforeach
                <div class="flex items-center justify-center">
                    <x-admin.primary-action-button as="submit" :value="__('adminify.submit')" class="mb-2" />
                </div>
            </form>
        </div>
    </div>
    <x-admin.delete-action-confirmation-modal/>
</x-layouts.admin>
