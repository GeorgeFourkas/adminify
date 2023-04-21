<div role="status" data-role="statistic-card-skeleton" id="{{$attributes->get('id')}}"
     class="w-full py-4  rounded-xl shadow-soft-xl animate-pulse md:p-6 dark:border-gray-700">
    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
    <div class="w-48 h-2 mb-10 bg-gray-200 rounded-full dark:bg-gray-700"></div>
    <div class="flex items-baseline mt-4 py-16 space-x-3 ">
        <div class="w-full h-28 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-12 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-10 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-14 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-16 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-28 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-8 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-14 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-10 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-28 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-10 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-4 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-12 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
        <div class="w-full h-28 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
    </div>
    <div class="flex items-start justify-start flex-col mt-5">
        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
        <div class="w-48 h-2 mb-10 bg-gray-200 rounded-full dark:bg-gray-700"></div>
    </div>

    <div class="flex items-center justify-between px-6 mx-auto">
        {{$slot}}
    </div>


    <span class="sr-only">Loading...</span>
</div>
