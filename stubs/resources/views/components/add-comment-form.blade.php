<div class="mt-10 mb-10" id="#add_comment_form">
    <h1>{{__('Leave A Reply')}}</h1>
    @guest()
        <p>{{__('Your email address will not be published. Required fields are marked')}}
            <span class="text-indigo-500">*</span>
        </p>
        <form action="{{route('comment.create')}}" method="POST">
            @csrf
            <div class="flex items-center justify-center w-full">
                <div class="w-1/2">
                    <x-input-label :value="__('name')"/>
                    <x-text-input/>
                </div>
                <div class="w-1/2">
                    <x-input-label :value="__('email')"/>
                    <x-text-input/>
                </div>
            </div>
            @endguest
            <div class="w-full mt-5 h-48 mb-10">
                <x-input-label :value="__('Comment:')"/>
                <textarea class="w-full h-48 mt-2 resize-none rounded-lg border-footerPurple"></textarea>
            </div>
            <input type="submit" value="{{__('Submit')}}"
                   class="px-3 py-2 bg-footerPurple text-white font-nunito cursor-pointer rounded-lg
                         hover:bg-lightPurple text-sm transition duration-100">
            {!! app('captcha')->render(); !!}
        </form>
</div>
