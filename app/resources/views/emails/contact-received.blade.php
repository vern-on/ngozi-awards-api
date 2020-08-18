@component('mail::message')
# Website Contact Received

__Name:__ {{ $contact->name}}<br>
__Email:__ {{ $contact->email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent