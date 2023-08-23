@component('mail::message')
{!! $messageBody !!}

Thank you for contacting us.

Regards,<br>
{{ env('APP_NAME') }}
@endcomponent
