<div>
    <li class="w-full mt-0.5 group font-admin-sans ">
        <a href="{{$link}}" class="py-2.5  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
         hover:bg-white hover:shadow-soft-3xl cursor-pointer px-2 text-slate-700 transition-colors rounded-lg
          {{Str::contains(Route::currentRouteName(), Str::lower($text)) ? 'bg-white shadow-soft-3xl' : ''}}">
            <div class="{{Str::contains(url()->current(), Str::lower($text)) ?'gradient-app-theme' : ''}}
                    mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white z-50 bg-center stroke-0 text-center xl:p-2.5
                    group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 shadow-soft-3xl">
                {{$slot}}
            </div>
            <span
                class="pointer-events-none ml-1 opacity-100 duration-300 ease-soft text-slate-500
                       text-xssm group-hover:text-slate-700
                        {{Str::contains(Route::currentRouteName(), Str::lower($text)) ? 'text-slate-600 font-semibold' : 'text-slate-500 '}}">
               <p class="text-[13px] font-admin-sans">
                {{$text}}
               </p>
            </span>
        </a>
    </li>
</div>
