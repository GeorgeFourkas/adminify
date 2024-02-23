<x-mail::message>
<p style="text-align:center;">Νέο Μήνυμα Φόρμας Επικοινωνίας</p>
<b>Όνομα</b>: {{ $contact->getFirstName() ?? '-'}} <br><br>
<b>Επώνυμο</b>: {{ $contact->getLastName() ?? '-'}} <br><br>
<b>Email</b>: {{ $contact->getEmail() ?? '-'}} <br><br>
<b>Τηλέφωνο Επικοινωνίας</b>: {{ $contact->getPhone() ?? '-'}}
<br><br><br>
<x-mail::panel>
{{ $contact->getMsg() ?? '-'}}
</x-mail::panel>
</x-mail::message>
