@component('mail::message')
# Website Contact Received

__Name:__ {{ $contact->name}}<br>
__Email:__ {{ $contact->email }}

@component('mail::panel')
{{ $contact->message }}
@endcomponent

@endcomponent