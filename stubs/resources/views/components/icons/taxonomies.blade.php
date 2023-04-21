@php
    $isRoute = Str::contains(url()->current(), 'tags') ||  Str::contains(url()->current(), 'tags');
@endphp
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
     class="w-4 h-4 lg:w-6 lg:h-6 group-hover:fill-white  {{$isRoute ? 'text-white' : 'text-slate-700'}}"
     fill="currentColor"
>
    <path fill-rule="evenodd"
          d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"
          clip-rule="evenodd"/>
</svg>
