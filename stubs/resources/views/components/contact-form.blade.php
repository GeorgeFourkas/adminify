@props([
    'submit' => true
])

<form action="{{ route('contact.submit') }}" method="post" class="" id="{{ getFormId() }}">
    @csrf
    {{ $slot }}
    @if($submit)
        {!! htmlFormButton('submit', [
        'class' => 'px-2 py-2 bg-gray-500 rounded-lg text-white cursor-pointer hover:bg-gray-700'
    ]) !!}
    @endif
</form>
