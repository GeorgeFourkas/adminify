<div role="status" data-role="statistic-card-skeleton" id="{{ $attributes->get('id') }}"
     class="w-full animate-pulse rounded-xl py-4 shadow-soft-xl dark:border-gray-700 md:p-6">
    <div class="w-32 rounded-full bg-gray-200 h-2.5 mb-2.5 dark:bg-gray-700"></div>
    <div class="mb-10 h-2 w-48 rounded-full bg-gray-200 dark:bg-gray-700"></div>
    <div class="mt-4 flex items-baseline py-16 space-x-3">
        <div class="h-28 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-12 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-10 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-14 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-16 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-24 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-28 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-8 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-24 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-14 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-10 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-28 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-24 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-10 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-4 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-12 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
        <div class="h-28 w-full rounded-t-lg bg-gray-200 dark:bg-gray-700"></div>
    </div>
    <div class="mt-5 flex flex-col items-start justify-start">
        <div class="w-32 rounded-full bg-gray-200 h-2.5 mb-2.5 dark:bg-gray-700"></div>
        <div class="mb-10 h-2 w-48 rounded-full bg-gray-200 dark:bg-gray-700"></div>
    </div>
    <div class="mx-auto flex items-center justify-between px-6">
        {{ $slot }}
    </div>
    <span class="sr-only">Loading...</span>
</div>
