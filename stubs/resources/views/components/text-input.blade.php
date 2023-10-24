@props(['disabled' => false])

<input {{$disabled}} {!! $attributes->merge(
    [
        'class' => 'focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                    border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                    transition-all placeholder:text-gray-500 focus:outline-none'
    ]
) !!}>
