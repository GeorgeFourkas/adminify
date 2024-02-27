<x-main-layout>
    <div class="mx-auto mt-14 w-11/12 lg:w-3/4">
        <div class="relative flex flex-col-reverse lg:flex-row w-full items-start justify-center">
            <div class="mx-auto w-full lg:w-2/3 xl:w-1/2">
                <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
                    @forelse($posts as $i => $post)
                        <article class="relative isolate flex flex-col gap-8 lg:flex-row">
                            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                                <img src="{{ $post?->media->first()->url }}" alt=""
                                     class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                            </div>
                            <div>
                                <div class="flex items-center gap-x-4 text-xs">
                                    <time datetime="{{ $post->created_at->format('d-m-Y') }}" class="text-gray-500">
                                        {{ $post->created_at->translatedFormat('M d, Y') }}
                                    </time>
                                    @foreach($post?->categories as $category)
                                        <a href="{{ route('blog', ['category' => $category->name]) }}"
                                           class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="group relative max-w-xl">
                                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="{{ route('blog.single',  $post->slug) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="mt-5 text-sm leading-6 text-gray-600">
                                        {{ str(strip_tags($post->body))->words(30) }}
                                    </p>
                                </div>
                                <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                                    <div class="relative flex items-center gap-x-4">
                                        <img
                                            src="{{ $post->user->media?->first()?->url ?? url('https://ui-avatars.com/api/?name=' . $post->user->name)  }}"
                                            alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="{{ route('blog', ['user' => $post->user->name ]) }}">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $post->user->name }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="h-96 mt-16">
                            <p class="text-center">
                                {{ __('Δεν υπάρχουν ενεργά άρθρα αυτή τη στιγμή.') }}
                                <span class="mt-1"></span>
                                <br>
                                {{ __('Προσπαθήστε ξανά αργότερα') }}
                            </p>
                        </div>
                    @endforelse
                </div>
                <div class="flex items-center justify-center w-full my-10">
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
            <div class="lg:sticky top-40 mb-10 lg:mb-0 w-full lg:w-1/3 xl:w-1/4">
                <div class="p-10 border border-gray-100 shadow-xl">
                    <div>
                        <form class="relative mt-2 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                </svg>
                            </div>
                            <label for="query"></label>
                            <input type="text" name="query" id="query" placeholder="Search"
                                   value="{{ request()->input('query', '') }}"
                                   class="block w-full rounded-md border-0 py-4 pl-10 placeholder:text-gray-400 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </form>
                    </div>
                </div>
                @if($categories->isNotEmpty())
                    <div class="mt-10 px-8 py-10 leading-7 text-neutral-700 shadow-xl mb-10">
                        <div class="text-neutral-700">
                            <h3 class="mx-0 mt-0 mb-8 h-px w-12 border-0 pb-3 font-sans text-xl font-semibold leading-6 text-stone-900 xl:text-3xl">
                                {{ __('Κατηγορίες') }}
                            </h3>
                            <div class="h-1 w-16 bg-lingua"></div>
                        </div>
                        <ul class="m-0 mt-5 p-0 text-neutral-700 space-y-3">
                            @foreach($categories as $category)
                                <li class="relative mb-2 pl-4 text-left">
                                    <a href="{{ route('blog', ['category' => $category->name]) }}"
                                       class="flex cursor-pointer items-start justify-start hover:text-lingua">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="block h-4 w-4 mt-1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                        </svg>
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-main-layout>
