<div class="mx-5 flex items-center jusify-between">
    @if(count($publishedLanguages)> 1)
        @foreach($publishedLanguages as $key )
            <form action="{{route('language.switch')}}" method="POST">
                @csrf
                <input type="submit"
                       class=" text-white text-md block mx-2 text-sm py-0.5 uppercase {{App::getLocale() == $key ? 'text-orangy text-xs border-b border-b-orangy' : 'hover:text-orangy hover:border-b hover:border-b-orangy cursor-pointer'}}"
                       {{App::getLocale() == $key ? 'disabled' : ''}}
                       name="lang"
                       value="{{$key}}">
            </form>
        @endforeach
    @endif
</div>
