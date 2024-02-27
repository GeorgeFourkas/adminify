@php use App\Constants\Permissions;use Illuminate\Support\Carbon; @endphp
<x-layouts.admin>
    <x-admin.session-flash/>
    <div class="mx-auto w-full px-6 py-6">
        <div class="-mx-3 flex flex-wrap">
            <div class="w-full max-w-full flex-none px-3">
                <div
                    class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
                    <div class="flex w-full items-center justify-between">
                        <div
                            class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 capitalize border-b-solid">
                            <h6>{{ __('adminify.users.page_title') }} </h6>
                        </div>
                        @can(Permissions::CREATE_USERS)
                            <div
                                class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                                <x-admin.primary-action-button
                                    :text="__('adminify.users.action_button')"
                                    :href="route('user.create')"
                                    as="link">
                                    <x-icons.add/>
                                </x-admin.primary-action-button>
                            </div>
                        @endcan
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="overflow-x-auto p-0">
                            <table class="mb-0 w-full items-center border-gray-200 align-top text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.users.name') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.users.email') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.users.role') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.users.registered_at') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-solid border-gray-200 bg-transparent px-6 py-3 align-middle font-semibold capitalize text-slate-400 opacity-70 shadow-none tracking-none"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img
                                                        src="{{ $user->media->first()->url ?? url('https://ui-avatars.com/api/?name='.$user->name) }}"
                                                        class="mr-4 inline-flex hidden h-9 w-9 items-center justify-center rounded-xl text-sm text-white transition-all duration-200 ease-soft-in-out sm:block"
                                                        alt="user1"/>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <p class="text-xssm">
                                                        {{ str()->limit($user->name, 20) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <p class="mb-0 text-xs font-normal font-semibold leading-tight">{{ $user->email }}</p>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle text-sm leading-normal shadow-transparent">
                                            <p class="text-xs font-normal capitalize">{{ $user->roles->first()->name ?? '-' }}</p>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle shadow-transparent">
                                            <span class="text-xs font-normal leading-tight text-slate-400">
                                                {{ $user->created_at->format('d-m-Y') }}
                                            </span>
                                            <span class="mt-1 block text-xs font-normal leading-tight text-slate-400">
                                                {{ $user->created_at->format('h:i:s') }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <div class="flex w-1/2 items-start justify-between">
                                                @can(Permissions::UPDATE_USERS)
                                                    <div class="">
                                                        <a href="{{ route('user.edit', $user) }}">
                                                            <div class="cursor-pointer rounded-md p-2 group hover:from-adminify-main-color hover:to-adminify-secondary-color hover:bg-gradient-to-tl">
                                                                <x-icons.edit/>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can(Permissions::DELETE_USERS)
                                                    <form action="{{ route('user.delete', $user) }}" method="POST"
                                                          deletion-form>
                                                        @method('DELETE') @csrf
                                                        <button tabindex="-1"
                                                                class="flex w-full cursor-pointer items-center justify-center rounded-md p-2 group hover:bg-red-500">
                                                            <x-icons.trash />
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <x-admin.delete-action-confirmation-modal />
                            <div class="mx-auto flex w-2/3 flex-col">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
