@props(['post'])
<div
    class="z-10 mx-5 mt-3 h-64 w-full rounded-xl bg-white px-3 py-8 shadow-xl bg-cover bg-center transition duration-300 post_container group lg:w-1/3"
    id="post_container_1" style="--path:url('{{ url($post->translation?->media->first()->url ?? '') }}')">
    <div class="text-left">
        <h4
            class="pointer-events-none transition duration-300 text-md text-paragraphGray group-hover:text-white">
            {{ Carbon\Carbon::parse($post->created_at)->format('d F Y') }}
        </h4>
        <div class="my-4 w-full">
            <h1
                class="text-lg font-bold transition duration-300 text-darkPurple group-hover:text-white">
                {{ $post->translation->title ?? ''}}
            </h1>
        </div>
    </div>
    <div class="mt-14 flex items-center justify-between px-5">
        <a href="#"
           class="text-xs font-semibold uppercase tracking-widest transition duration-300 text-lightPurple group-hover:text-white">
            {{ __('read more') }}
        </a>
    </div>
</div>
