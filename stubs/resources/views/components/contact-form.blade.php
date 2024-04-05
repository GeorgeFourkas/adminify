@props(['submit' => true])
<form {{ $attributes->merge([
    'action' => route('contact.submit'),
    'method' => 'post',
    'id' => getFormId(),
]) }}>
{{--    action="{{ route('contact.submit') }}" method="post" class="" id="{{ getFormId() }}"--}}
    @csrf
    {{ $slot }}
    @if($submit)
        {!! htmlFormButton('submit', [
        'class' => 'w-full capitalize px-2 py-2 bg-purple-700 rounded-lg text-white cursor-pointer hover:bg-purple-500 mt-3'
    ]) !!}
    @endif
</form>
