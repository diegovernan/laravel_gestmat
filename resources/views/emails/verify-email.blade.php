@component('mail::message')


<h1>Olá!</h1>

<p>Por favor, clique no botão abaixo para confirmar seu e-mail.</p>

@component('mail::button', ['url' => $url])
Confirmar e-mail
@endcomponent

<p>Caso você não tenha criado uma conta, basta ignorar este esta mensagem.</p>

{{ config('app.name') }}

@endcomponent