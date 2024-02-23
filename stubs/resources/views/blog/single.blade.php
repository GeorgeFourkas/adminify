<x-main-layout>
    @push('meta_tags')
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ str(str_replace('&nbsp', '', strip_tags($post->body)))->words(12) }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ url($post?->media?->first()?->url) }}" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="{{ config('app.name') }}" />
        <meta name="twitter:title" content="{{ $post->title }}" />
        <meta name="twitter:description" content="{{  str(str_replace('&nbsp', '', strip_tags($post->body)))->words(12) }}" />
        <meta name="twitter:image" content="{{ url($post?->media?->first()?->url) }}" />
    @endpush
    <div class="mx-auto mt-14 w-full lg:w-11/12 xl:w-4/5">
        <div
            class="relative flex flex-col lg:flex-row w-full items-start justify-center space-x-0 lg:space-x-5 xl:space-x-10">
            <div class="mx-auto w-11/12 lg:w-2/3 xl:w-3/4">
                <div class="mb-16 leading-7 text-neutral-700 transition-all duration-300 rounded-xl">
                    <div class="text-neutral-700 xl:px-10">
                        <div class="relative aspect-[16/9] sm:aspect-[2/1] ">
                            <img src="{{ $post?->media->first()->url }}"
                                 alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                    </div>
                    <div class="xl:px-12 pt-8 pb-12 text-neutral-700">
                        <h3 class="mx-0 mt-0 mb-2 font-sans text-2xl font-bold leading-9 xl:text-3xl text-stone-900">
                            <a href="#"
                               class="cursor-pointer hover:text-lingua transition-all duration-300">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <ul class="p-0 mx-0 mt-0 mb-5 flex" style="list-style: outside none none;">
                            <li class="inline-flex mr-4 text-xs leading-6 text-left  items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="text-lingua w-3.5 h-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                </svg>
                                {{ $post->created_at->format('M d, Y') }}
                            </li>
                            <li class="inline-flex mr-4 text-xs leading-6 text-left  items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-3.5 h-3.5 text-lingua">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>

                                {{ $post?->user?->name }}
                            </li>
                            <li class="inline-flex m-0 text-xs leading-6 text-left">
                                <a href="#"
                                   class="flex items-center cursor-pointer hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="w-3.5 h-3.5 text-lingua">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
                                    </svg>
                                </a>
                                <div class=" ml-2 space-x-3 max-w-fit">
                                    @foreach($post->tags as $tag)
                                        <span class="border border-gray-100 p-1">#{{ $tag->name }}</span>
                                    @endforeach
                                </div>

                            </li>
                        </ul>
                        <div class="ck-content">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:sticky top-40 mb-10 lg:mb-0 w-full px-10 lg:px-0 lg:w-1/3 xl:w-1/4">
                <h1 class="text-gray-500 uppercase font-semibold text-sm">LATEST NEWS</h1>
                <div class="w-full space-y-8 mt-6">
                    @foreach($latest as $latestPost)
                        <article class="relative isolate flex gap-8 lg:flex-row">
                            <div class="relative sm:aspect-[16/9] w-36 lg:w-28 lg:shrink-0 ">
                                <img src="{{ $latestPost?->media?->first()?->url }}" alt=""
                                     class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                            </div>
                            <div>
                                <div class="flex items-center gap-x-4 text-xs">
                                    <time datetime="{{ $latestPost->created_at->format('Y-m-d') }}" class="text-gray-500">
                                        {{ $latestPost->created_at->translatedFormat('M d, Y') }}
                                    </time>
                                </div>
                                <div class="group relative max-w-xl">
                                    <h3 class="mt-3 text-md font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="{{ route('blog.single', $latestPost->slug) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ str($latestPost->title)->words(3) }}
                                        </a>
                                    </h3>
                                    <p class="mt-5 text-sm leading-6 text-gray-600">
                                        {{ Str::words(strip_tags($latestPost->body), 10) }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-main-layout>
