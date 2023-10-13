@component('mail::message')

Greetings {{ $company_name }}!

{{ $email_template->head }}

{{ $email_template->body }}

@component('mail::button',['url' => 'https://www.google.com']) 
    Click Here
@endcomponent
    
@endcomponent
