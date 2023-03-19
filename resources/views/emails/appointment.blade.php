@component('mail::message')
    # Hello Mr.{{ $user_name }}

    We hope this email finds you well.

    We would like to inform you that your appointment has scheduled on
    {{ $appoint_date }} at {{ $appoint_time }}.



    Thank you for your attention to this matter.

    Best regards,

    # {{ config('app.name') }} Team
@endcomponent
