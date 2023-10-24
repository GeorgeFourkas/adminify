@php use App\Constants\Permissions;use Illuminate\Support\Carbon;use Illuminate\Support\Facades\Route; @endphp
<x-layouts.admin>
    <x-admin.session-flash/>
    <div class="mx-auto w-full px-6 py-6">
        <div class="-mx-3 flex flex-wrap">
            <div class="w-full max-w-full flex-none px-3">
                <div
                    class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
                    <div class="flex w-full items-center justify-between">
                        <div
                            class="mb-0 rounded-t-2xl capitalize border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                            <h6>{{ __('adminify.menu.posts') }}</h6>
                        </div>
                        @can(Permissions::CREATE_POSTS)
                            <div
                                class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                                <x-admin.primary-action-button as="link" :href="route('posts.create')"
                                                               :text="__('adminify.create_post')">
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
                                    <th class="whitespace-nowrap capitalize border-b border-gray-200 bg-transparent px-6 py-3 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.post_title') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b capitalize border-gray-200 bg-transparent px-6 py-3 pl-2 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.post_author') }}
                                    </th>
                                    <th class="whitespace-nowrap capitalize border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.post_status') }}
                                    </th>
                                    <th class="whitespace-nowrap capitalize border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.post_created_at') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-solid border-gray-200 bg-transparent px-6 py-3 align-middle font-semibold capitalize text-slate-400 opacity-70 shadow-none tracking-none"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img
                                                        src="{{ $post->media?->first()?->url }}"
                                                        class="mr-4 inline-flex hidden h-9 w-9 items-center justify-center rounded-xl text-sm text-white transition-all duration-200 ease-soft-in-out sm:block"
                                                        alt="user1"/>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <a href="{{ Route::has('post.show') ? route('post.show', $post->slug ?? '#') : route('posts.edit', $post) }}"
                                                       class="mb-0 text-sm font-normal leading-normal hover:underline hover:underline-offset-2">
                                                        {{ str()->limit($post->title, 20) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <p class="mb-0 text-xs leading-tight">{{ $post->user->name }}</p>
                                            <p class="mt-2 mb-0 text-xs font-light capitalize leading-tight text-slate-400">
                                                {{ $post->user->roles->first()->name }}
                                            </p>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle text-sm leading-normal shadow-transparent">
                                            @if($post->published)
                                                <span
                                                    class="inline-block whitespace-nowrap rounded-md bg-lime-400 py-1 text-center align-baseline text-xs capitalize leading-none text-white px-1.5">
                                                    <p class="text-xs font-normal tracking-wider">
                                                        {{ __('Published') }}
                                                    </p>
                                                </span>
                                            @else
                                                <span
                                                    class="inline-block whitespace-nowrap rounded-md bg-red-400 py-1 text-center align-baseline capitalize leading-none text-white px-1.5">
                                                    <p class="text-xs">
                                                        {{ __('Unpublished') }}
                                                    </p>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight text-slate-400">
                                                {{ Carbon::parse($post->created_at)->format('d-m-Y') }}
                                            </span>
                                            <span class="mt-1 block text-xs font-semibold leading-tight text-slate-400">
                                                {{ Carbon::parse($post->created_at)->format('h:i:s') }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <div class="flex w-1/2 items-center justify-between">
                                                @can(Permissions::UPDATE_POSTS)
                                                    <a href="{{ route('posts.edit', $post) }}">
                                                        <div
                                                            class="cursor-pointer rounded-md p-2 group hover:bg-gradient-to-tl hover:from-adminify-main-color hover:to-adminify-secondary-color">
                                                            <x-icons.edit/>
                                                        </div>
                                                    </a>
                                                @endcan
                                                @can(Permissions::DELETE_POSTS)
                                                    <form action="{{ route('posts.delete', $post) }}" method="POST"
                                                          deletion-form>
                                                        @method('DELETE') @csrf
                                                        <button
                                                            class="flex w-full cursor-pointer items-center justify-center rounded-md p-2 group hover:bg-red-500">
                                                            <x-icons.trash/>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mx-auto flex w-2/3 flex-col">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-admin.delete-action-confirmation-modal/>
</x-layouts.admin>


