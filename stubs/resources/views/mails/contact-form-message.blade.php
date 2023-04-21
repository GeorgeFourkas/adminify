
<x-mail::message>
# Contact Form Message
{{__('Name')}}: {{$firstName}}, <br>
{{__('Last Name')}}: {{$lastName}}, <br>
{{__('Phone')}}: {{$phone}}, <br>
{{__('Email')}}: {{$email}}, <br>
<x-mail::panel>
{{$msg}}
</x-mail::panel>
</x-mail::message>

