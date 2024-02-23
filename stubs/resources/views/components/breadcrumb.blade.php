@props([
    'text' => '',
    'bgClass' => 'bg-breadcrumb',
])

<div class="relative py-40 px-0 leading-6 text-left text-white {{ $bgClass }} bg-cover bg-center">
    <div class="px-3 mx-auto w-full text-left max-w-[1300px]">
        <div class="flex flex-wrap items-center -mx-3 mt-0 text-white">
            <div class="flex-shrink-0 px-3 mt-0 w-full max-w-full lg:w-full lg:flex-none">
                <div aria-label="breadcrumb" class="">
                    <div class="relative  my-14">
                        <h1 class="mx-0 mt-0 mb-4 font-sans text-5xl not-italic font-medium capitalize break-words xl:text-4xl text-center leading-64">
                            {{ $text }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
