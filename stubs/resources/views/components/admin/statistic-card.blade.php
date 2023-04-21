<div class="hidden w-full max-w-full px-10 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 transition duration-400"
     data-role="statistic-card">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border"
         id="{{$attributes->get('id')}}">
        <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                        <p class="mb-0 font-semibold leading-normal text-[13px] font-admin-sans text-slate-600 tracking-wide">
                            {{$title}}
                        </p>
                        <div class="flex items-center mt-3">
                            <h5 class="mb-0 font-bold card-value font-admin-sans text-slate-800 text-lg"
                                id="statistic-card-value-{{$type}}">
                                {{$attributes->get('card_value') ?? ''}}
                            </h5>
                            <h5 id="statistic-card-percentage-{{$type}}"
                                class="leading-normal text-xs font-semibold mx-4 px-4 py-0.5 rounded-md card-percentage">
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="px-3 text-right basis-1/3 flex items-center justify-end">
                    <div
                        class="inline-block flex items-center justify-center w-12 h-12 text-center rounded-lg gradient-app-theme">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full max-w-full px-10 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 animate-pulse"
     data-role="statistic-card-skeleton" id="statistic-card-{{$type}}">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                        <div class="w-24 h-2 bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="mb-0 p-2 rounded mt-2 font-bold bg-gray-200"></div>
                            <div id=""
                                 class="leading-normal text-xs font-semibold mx-4 px-5 py-2.5 mt-3 rounded-md bg-gray-200"></div>
                        </div>
                    </div>
                </div>
                <div class="px-3 text-right basis-1/3 flex items-center justify-end">
                    <div
                        class="inline-block flex items-center justify-center w-12 h-12 text-center rounded-lg bg-gray-200">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

