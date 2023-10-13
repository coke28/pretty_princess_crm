@component('mail::message')

Hello {{ $company_name }},

{{ $email_template->head }}

{{ $email_template->body }}

Sincerely,
<br>
Pretty Princess

@component('mail::button',['url' => 'https://www.google.com']) 
    Click Here
@endcomponent

<div style="text-align: center;">
    <img src="{{ asset('demo1/media/logos/pretty_princess.jpg') }}" alt="Centered Image" class="centered-image">
</div>

@endcomponent
