@props(['text' => '','bgClass' => 'bg-breadcrumb',])
<div class="relative py-40 px-0 leading-6 text-left text-white {{ $bgClass }} bg-cover bg-center">
    <div class="mx-auto w-full px-3 text-left max-w-[1300px]">
        <div class="-mx-3 mt-0 flex flex-wrap items-center text-white">
            <div class="mt-0 w-full max-w-full flex-shrink-0 px-3 lg:w-full lg:flex-none">
                <div aria-label="breadcrumb" class="">
                    <div class="relative my-14">
                        <h1 class="mx-0 mt-0 mb-4 break-words text-center font-sans text-5xl font-medium capitalize not-italic leading-64 xl:text-4xl">
                            {{ $text }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
