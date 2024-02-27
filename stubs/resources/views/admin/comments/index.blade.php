@php use App\Constants\Permissions;use Illuminate\Support\Carbon; @endphp
<x-layouts.admin class="admin">
    @pushonce('scripts')
        @vite(['resources/js/admin/approve-toggler.js', 'resources/js/admin/full-comment-body-togler.js'])
    @endpushonce
    <x-admin.session-flash/>
    <div class="mx-auto w-full px-6 py-6">
        <div class="-mx-3 flex flex-wrap">
            <div class="w-full max-w-full flex-none px-3">
                <div
                    class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border font-semibold shadow-lg">
                    <div class="flex w-full items-center justify-between">
                        <div
                            class="mb-0 rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0 capitalize border-b-solid">
                            <h6>{{ __('adminify.comments.page_title') }}</h6>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="overflow-x-auto p-0">
                            <table
                                class="mb-0 w-full items-center border-gray-200 align-top text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.comments.comment_column') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 pl-2 text-left align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.comments.author_column') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.comments.post_column') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.comments.approved_column') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-gray-200 bg-transparent px-6 py-3 text-center align-middle font-bold uppercase text-slate-400 opacity-70 shadow-none text-xxs border-b-solid tracking-none">
                                        {{ __('adminify.comments.uploaded_column') }}
                                    </th>
                                    <th class="whitespace-nowrap border-b border-solid border-gray-200 bg-transparent px-6 py-3 align-middle font-semibold capitalize text-slate-400 opacity-70 shadow-none tracking-none"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr class="hover:bg-gray-50">
                                        <td class="max-w-sm whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent comment-body hover:cursor-pointer">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <p class="font-normal text-xssm">{{ $comment->body }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            @if($comment->user)
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $comment?->user?->media?->first()?->url ?? '' }}"
                                                             class="mr-1 inline-flex hidden h-6 w-6 items-center justify-center rounded-xl text-sm text-white transition-all duration-200 ease-soft-in-out sm:block"
                                                             alt="user1"
                                                        />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <p class="text-xssm">{{ str()->limit($comment->user->name, 20)}}</p>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-xssm"> - </p>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle text-sm leading-normal shadow-transparent">
                                            <a href="{{ route('post.show', [ $comment->post->slug, '#comment-' . $comment->id]) }}"
                                               class="text-xs font-normal capitalize text-blue-400 hover:text-blue-600">{{ str()->limit($comment->post->title, '30',) }}</a>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle text-sm leading-normal shadow-transparent">
                                            <div class="flex items-center justify-center">
                                                <form action="{{ route('comment.approve', $comment) }}" method="POST"
                                                      comment-approval>
                                                    <div class="max-w-md">
                                                        <x-admin.radio-toggler
                                                            value="{{ $comment->approved }}"
                                                            label=""
                                                        />
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 text-center align-middle shadow-transparent">
                                            <span class="text-xs font-normal leading-tight text-slate-400">
                                                {{ $comment->created_at->format('d-m-Y') }}
                                            </span>
                                            <span
                                                class="mt-1 block text-xs font-normal leading-tight text-slate-400">
                                                {{ $comment->created_at->format('h:i:s') }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap border-t bg-transparent p-2 align-middle shadow-transparent">
                                            <div class="flex w-1/2 items-center justify-between">
                                                @can(Permissions::DELETE_COMMENTS)
                                                    <form action="{{ route('comment.delete', $comment) }}" method="POST"
                                                          deletion-form>
                                                        @method('DELETE') @csrf
                                                        <button tabindex="-1"
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
                            <x-admin.delete-action-confirmation-modal/>
                            <div class="mx-auto flex w-2/3 flex-col">
                                {{ $comments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>


