@component('mail::message')
# Nuevo Usuario

The body of your message.

@component('mail::button', ['url' => ''])
Ir al Aplicativo
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
