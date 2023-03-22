@component('mail::message')
    # Hello Dr. {{ $doctor_name }}

    We hope this email finds you well.

    We would like to inform you that your patient {{ $user_name }} has scheduled an appointment with you on
    {{ $appoint_date }} at {{ $appoint_time }}.


    Thank you for your attention to this matter.

    Best regards,

    {{ config('app.name') }}
@endcomponent
