@php use Carbon\Carbon; @endphp
<x-layouts.admin>
    @pushonce('scripts')
        @vite(['resources/js/admin/charts.js', 'resources/js/admin/date-picker.js'])
    @endpushonce

    <div class="mx-auto w-full px-6 py-6 font-admin-sans" id="dashboard-container"
         data-availablelocales="{{ json_encode($published_languages) }}">
        <x-admin.session-flash/>
        {{-- Row 1 --}}
        <div class="-mx-3 flex flex-wrap">
            <x-admin.statistic-card id="live-users-container" :title="__('adminify.dashboard.cards.0.title')" type="3">
                <x-icons.spining-arrows/>
            </x-admin.statistic-card>
            <x-admin.statistic-card :title="__('adminify.dashboard.cards.1.title')" type="1">
                <x-icons.user/>
            </x-admin.statistic-card>
            <x-admin.statistic-card :title="__('Average Session Time')" type="2">
                <x-icons.clock/>
            </x-admin.statistic-card>
            <x-admin.statistic-card :title="__('Total Posts')" type="4" :card_value="$posts_count">
                <x-icons.post class="fill-white"></x-icons.post>
            </x-admin.statistic-card>
        </div>

        {{-- Row 2 --}}
        <div class="-mx-3 mt-6 flex flex-wrap">
            <div class="mb-6 w-full px-3 lg:mb-0 lg:w-7/12 lg:flex-none">
                <div
                    class="relative flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-soft-xl">
                    <div class="flex-auto px-4">
                        <div class="-mx-3 flex flex-wrap items-center justify-center">
                            <div class="w-7/12 px-4 py-2">
                                <div class="mx-auto flex flex-col items-center justify-center">
                                    <div class="flex flex-col">
                                        <p class="mb-1 pt-2 font-semibold capitalize text-slate-700 font-admin-sans">
                                            {{ __('adminify.dashboard.hero.upper_text') }}
                                        </p>
                                        <h5 class="text-xl font-bold capitalize text-slate-600 font-admin-sans">
                                            {{ __('adminify.dashboard.hero.title') }}
                                        </h5>
                                        <p class="mb-12 text-slate-600 font-admin-sans">
                                            {{ __('adminify.dashboard.hero.description') }}
                                        </p>
                                    </div>
                                    <div class="mx-auto flex w-5/12 items-center justify-center"
                                         id="no-users-placeholder">
                                        <div
                                            class="relative flex h-28 w-28 items-center justify-center overflow-x-visible rounded-full border-8 border-gray-700 border-gray-800">
                                            <div class="absolute w-64 overflow-x-visible bg-white text-center">
                                                <p class="text-center text-sm">
                                                    {{ __('adminify.dashboard.hero.no_data') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <canvas id="devices-donut" class="hidden" height="120"></canvas>
                                    </div>
                                    <div class="mt-5 flex w-full items-center justify-between"
                                         id="device-percentages"></div>
                                </div>
                            </div>
                            <div class="mt-12 ml-auto max-w-full px-3 text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                                <div class="h-full rounded-xl gradient-app-theme">
                                    <div class="relative flex h-full items-center justify-center">
                                        <img class="relative z-20 w-full pt-6" alt="rocket"
                                             src="{{ Vite::asset('resources/images/admin/illustrations/rocket-white.png') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                <div
                    class="relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4 border-black/12.5 shadow-soft-xl">
                    <div
                        class="relative h-full overflow-hidden rounded-xl bg-cover bg-no-repeat bg-laptop bg-center-top">
                        <span
                            class="absolute top-0 left-0 h-full w-full bg-gradient-to-tl from-gray-900 to-slate-800 bg-cover bg-center opacity-80">
                        </span>
                        <div class="relative z-10 flex h-full flex-auto flex-col p-4">
                            <h5 class="mb-6 pt-2 font-bold text-white">
                                {{__('adminify.dashboard.documentation.upper_text')}}
                            </h5>
                            <p class="text-white">
                                {{__('adminify.dashboard.documentation.description')}}
                            </p>
                            <a class="mt-auto mb-0 text-sm font-semibold leading-normal text-white group"
                               href="javascript:">
                                {{__('adminify.dashboard.documentation.link')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Row 3 --}}
        <div class="-mx-3 mt-6 flex flex-wrap items-center justify-center">
            <div class="mt-0 mb-6 w-full max-w-full p-6 lg:mb-0 lg:w-5/12 lg:flex-none">
                <x-admin.skeletons.line-chart-loader data-role="statistic-card-skeleton" id="sources-chart-loader">
                    <x-admin.skeletons.traffic-card-skeleton/>
                    <x-admin.skeletons.traffic-card-skeleton/>
                    <x-admin.skeletons.traffic-card-skeleton/>
                    <x-admin.skeletons.traffic-card-skeleton/>
                </x-admin.skeletons.line-chart-loader>
                <div id="chart-sources" data-role="statistic-card"
                     class="relative z-20 flex hidden min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border py-6 border-black/12.5 shadow-soft-xl">
                    <x-admin.date-range-picker
                        start-id="start-source-chart-date-picker"
                        end-id="end-source-chart-date-picker"
                        :start-date-placeholder="Carbon::now()->subDays(51)->format('d-m-Y')"
                        :end-date-placeholder="Carbon::now()->subDays(2)->format('d-m-Y')"
                    />
                    <div class="flex-auto p-4">
                        <div class="mb-4 rounded-xl bg-gradient-to-tl from-gray-900 to-slate-800 py-4 pr-1">
                            <div>
                                <canvas id="chart-bars" height="147"></canvas>
                            </div>
                        </div>
                        <h6 class="mt-6 mb-0 ml-2 font-semibold capitalize font-admin-sans">
                            {{__('website visitor sources')}}
                        </h6>
                        <div class="mx-auto w-full max-w-screen-2xl rounded-xl px-6">
                            <div class="-mx-3 mt-0 flex flex-wrap">
                                <x-admin.sources source="facebook">
                                    <x-icons.facebook></x-icons.facebook>
                                </x-admin.sources>
                                <x-admin.sources source="instagram">
                                    <x-icons.instagram></x-icons.instagram>
                                </x-admin.sources>
                                <x-admin.sources source="google">
                                    <x-icons.google></x-icons.google>
                                </x-admin.sources>
                                <x-admin.sources source="bing">
                                    <x-icons.bing></x-icons.bing>
                                </x-admin.sources>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-0 w-full max-w-full px-3 lg:w-7/12 lg:flex-none">
                <x-admin.skeletons.line-chart-loader data-role="statistic-card-skeleton" id="line-chart-loader"/>
                <div data-role="statistic-card" id="line-chart-container"
                     class="relative z-20 flex hidden min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border border-black/12.5 shadow-soft-xl">
                    <div class="mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0 border-black/12.5">
                        <x-admin.date-range-picker
                            start-id="start-traffic-chart-date-picker"
                            end-id="end-traffic-chart-date-picker"
                            :start-date-placeholder="Carbon::now()->subDays(51)->format('d-m-Y')"
                            :end-date-placeholder="Carbon::now()->subDays(2)->format('d-m-Y')"
                        />
                        <h6 class="capitalize">
                            {{ __('adminify.dashboard.charts.0.title') }}
                        </h6>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <canvas id="chart-line" height="155"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Row 4 --}}
        <div class="-mx-3 my-6 flex flex-wrap md:flex-row">
            <div class="my-3 w-full max-w-full px-3 md:flex-none lg:my-0 lg:w-5/12 lg:flex-none">
                <div
                    class="relative flex h-full min-w-0 flex-col break-words rounded-xl border-0 border-solid bg-white bg-clip-border border-black/12.5 shadow-soft-xl">
                    <div class="mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0 border-black/12.5">
                        <h6 class="capitalize">{{  __('adminify.dashboard.charts.1.title') }} </h6>
                    </div>
                    <div class="flex-auto p-4">
                        <div id="timeline-container"
                             class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="my-3 w-full rounded-xl bg-white px-3 px-4 py-6 shadow-soft-xl md:flex-none lg:my-0 lg:w-7/12 lg:flex-none">
                <h1 class="text-center capitalize text-gray-700 text-md">
                    {{ __('adminify.dashboard.charts.2.title') }}
                </h1>
                <canvas id="map-chart" class=""></canvas>
            </div>
        </div>
    </div>
</x-layouts.admin>
