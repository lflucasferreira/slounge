@component('mail::message')
Olá {{ $appointment->client->nome }},

O compromisso do dia **{{ $appointment->data->format('d/m/Y') }}** foi cancelado.

### Detalhes
Serviço: **{{ $appointment->service->nome }}**. <br/>
Data: **{{ $appointment->data->format('d/m/Y') }}** das **{{ $appointment->inicio->format('H:i') }}** às **{{ $appointment->fim->format('H:i') }}**. <br/> 
Valor: **R$ {{ $appointment->preco }}**. <br/>
Status: **{{ $appointment->situacao }}**. <br/>
Observação: **{{ $appointment->observacao ? $appointment->observacao : 'Nenhuma' }}**.

Caso queira reagendar este compromisso, clique no botão **Reagendar Compromisso** abaixo.

@component('mail::button', ['url' => "$path/appointments/$appointment->id/cancel"])
Reagendar Compromisso
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
