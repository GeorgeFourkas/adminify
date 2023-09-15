<li class="w-full border-0 max-w-[200px]" role="presentation">
    <button
        class="inline-block w-full rounded-md border-0 px-2 py-2 group hover:bg-gradient-to-tl hover:from-purple-700 hover:to-pink-500 focus:outline-none"
        type="button" role="tab" aria-controls="profile-example-{{$id}}"
        aria-selected="false" aria-current="page"
        id="profile-tab-example-{{$id}}">
        <span class="flex items-center justify-center group-hover:text-white">
            {{$slot}}
            {{$tabName}}
        </span>
    </button>
</li>
