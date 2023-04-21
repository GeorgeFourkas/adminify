<div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
    <div class="flex mb-2">
        <div
            class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl b text-neutral-900">
            {{$slot}}
        </div>
        <p class="mt-1 mb-0 font-semibold leading-tight text-xs">Users</p>
    </div>
    <h4 class="font-bold" id="session-source-{{$source}}"></h4>
    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
        <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden
                    whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
             role="progressbar" aria-valuenow="60" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>
</div>
