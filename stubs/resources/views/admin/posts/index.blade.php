@php use Illuminate\Support\Carbon; @endphp
<x-layouts.admin class="admin">
    <x-slot:head>
        @vite([
            'resources/js/flash-timeout.js',
            'resources/js/admin/confirm-modal.js',
        ])
    </x-slot:head>
    <div class="mx-auto w-full px-6 py-6">
        <div class="-mx-3 flex flex-wrap">
            @if(Session::has('success'))
                <div
                    class="mx-auto flex h-10 w-full items-center justify-center rounded-lg bg-lime-500 px-6 text-white"
                    id="flash-container">
                    <p>{{Session::get('success')}}</p>
                </div>
            @endif
            <div class="w-full max-w-full flex-none px-3">
                <div
                    class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
                    <div class="flex w-full items-center justify-between">
                        <div
                            class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                            <h6>{{__('Posts')}}</h6>
                        </div>
                        @can(\App\Constants\Permissions::CREATE_POSTS)
                            <div
                                class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 border-b-solid">
                                <a href="{{ route('posts.create') }}"
                                   class="p-3 gradient-app-theme text-white shadow-soft-2xl capitalize
                                text-xs rounded-lg hover:bg-gradient-to-l hover:from-white hover:to-white
                                hover:text-paragraphGray transition duration-300">
                                    <x-icons.add></x-icons.add>
                                    {{ __('Create Post') }}
                                </a>
                            </div>
                        @endcan
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
                                        {{__('Author')}}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{__('Status')}}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{__('Created')}}
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
                                                        src="{{($post->translation?->media?->first()?->url)}}"
                                                        class="hidden sm:block mr-4 inline-flex h-9 w-9 items-center justify-center rounded-xl text-sm text-white transition-all duration-200 ease-soft-in-out"
                                                        alt="user1"/>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <a href="{{route('post.show', $post->slug ?? '#')}}"
                                                       class="mb-0 text-sm leading-normal hover:underline hover:underline-offset-2 font-normal">
                                                        {{Str::limit($post->title, 20 , '...')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <p class="mb-0 text-xs  leading-tight">{{ $post->user->name }}</p>
                                            <p class="mb-0 mt-2 text-xs leading-tight font-light capitalize text-slate-400">
                                                {{ $post->user->roles->first()->name }}
                                            </p>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle text-sm leading-normal shadow-transparent">
                                            @if($post->published)
                                                <span class="bg-lime-400 text-xs rounded-md
                                                             py-1 px-1.5 inline-block whitespace-nowrap text-center align-baseline
                                                             capitalize leading-none text-white">
                                                    <p class="text-xs font-normal tracking-wider">
                                                        {{ __('Published') }}
                                                    </p>
                                                 </span>
                                            @else
                                                <span class="bg-red-400 rounded-md
                                                             py-1 px-1.5 inline-block whitespace-nowrap text-center align-baseline
                                                             capitalize leading-none text-white">
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
                                                @can(\App\Constants\Permissions::UPDATE_POSTS)
                                                    <a href="{{ route('posts.edit', $post) }}">
                                                        <div
                                                            class="cursor-pointer rounded-md p-2 group hover:bg-gradient-to-tl hover:from-purple-700 hover:to-pink-500">
                                                            <x-icons.edit></x-icons.edit>
                                                        </div>
                                                    </a>
                                                @endcan
                                                @can(\App\Constants\Permissions::DELETE_POSTS)
                                                    <form action="{{ route('posts.delete', $post) }}" method="POST"
                                                          deletion-form>
                                                        @method('DELETE')
                                                        @csrf
                                                        <button tabindex="-1"
                                                                class="flex w-full cursor-pointer items-center justify-center rounded-md p-2 group hover:bg-red-500">
                                                            <x-icons.trash></x-icons.trash>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <x-admin.posts.delete-post-modal></x-admin.posts.delete-post-modal>
                            <div class="mx-auto flex w-2/3 flex-col">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>


