@component('mail::message')
# New Incoming Message

Hello! You have received a new incoming contact message at youor portify portfolio website. You can check it if you have time to look at it!

@component('mail::button', ['url' => $url])
View Inbox
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent