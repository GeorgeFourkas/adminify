<div class="mb-6 hidden h-full transition duration-400  sm:flex-none xl:mb-0 " data-role="statistic-card">
    <div class="relative h-full flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-soft-xl"
         id="{{$attributes->get('id')}}">
        <div class="flex-auto p-4">
            <div class="-mx-3 flex flex-row">
                <div class="w-2/3 max-w-full flex-none px-3">
                    <div>
                        <p class="mb-0 font-semibold capitalize leading-normal tracking-wide text-slate-600 text-[13px] font-admin-sans">
                            {{ $title }}
                        </p>
                        <div class="mt-3 flex items-center">
                            <h5 class="mb-0 text-lg font-bold text-slate-800 card-value font-admin-sans"
                                id="statistic-card-value-{{$type}}">
                                {{$attributes->get('card_value') ?? ''}}
                            </h5>
                            <h5 id="statistic-card-percentage-{{$type}}"
                                class="mx-4 rounded-md px-4 text-xs font-semibold leading-normal py-0.5 card-percentage">
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="flex basis-1/3 items-center justify-end px-3 text-right">
                    <div
                        class="inline-block flex h-12 w-12 items-center justify-center rounded-lg text-center gradient-app-theme">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-6 h-full transition animate-pulse duration-400  sm:flex-none xl:mb-0 "
     data-role="statistic-card-skeleton" id="statistic-card-{{$type}}">
    <div class="relative flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-soft-xl">
        <div class="flex-auto p-4">
            <div class="-mx-3 flex flex-row">
                <div class="w-2/3 max-w-full flex-none px-3">
                    <div>
                        <div class="h-2 w-24 bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="mt-2 mb-0 rounded bg-gray-200 p-2 font-bold"></div>
                            <div id=""
                                 class="mx-4 mt-3 rounded-md bg-gray-200 px-5 text-xs font-semibold leading-normal py-2.5"></div>
                        </div>
                    </div>
                </div>
                <div class="flex basis-1/3 items-center justify-end px-3 text-right">
                    <div
                        class="inline-block flex h-12 w-12 items-center justify-center rounded-lg bg-gray-200 text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

