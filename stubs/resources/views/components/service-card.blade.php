@props(['image', 'hero', 'title', 'description'])
<div class="flex-col items-center justify-center lg:-mt-16 lg:w-1/3 lg:w-2/3">
    <div class="relative flex items-center justify-center">
        <img class="w-1/2 cursor-pointer select-none transition duration-500 hover:scale-125"
             src="{{ $image }}"
             alt="digital_agency_applications_thessaloniki">
        <div class="pointer-events-none absolute">
            <h1 class="-mt-8 mr-5 text-3xl font-extrabold text-white lg:text-5xl" id="header1">{{ $hero }}</h1>
        </div>
    </div>
    <div class="px-3 pb-8 text-center lg:px-12">
        <h1 class="text-xl font-bold text-darkPurple font-nunito">
            {{$title}}
        </h1>
        <p class="mt-4 text-paragraphGray font-rubik">
            {{ $description }}
        </p>
    </div>
</div>
