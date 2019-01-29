@component('mail::message')
O cliente {{ $client->nome }} foi cadastrado no sistema com o ID {{ $client->id }}

@component('mail::button', ['url' => ''])
Visualizar Cliente
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
