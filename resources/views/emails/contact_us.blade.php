@component('mail::message')
# {{ $contactUs->subject }}

{{ $contactUs->message }}

@component('mail::button', ['url' => ''])
    View Message
@endcomponent

From,<br>
{{ $contactUs->firstname }} {{ $contactUs->lastname }}
@endcomponent
