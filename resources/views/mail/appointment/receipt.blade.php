@component('mail::message')
Olá {{ $appointment->client->nome }},

Você está recebendo o recibo referente ao atendimento realizado em **{{ $appointment->data->format('d/m/Y') }}**.

### Detalhes
Serviço: **{{ $appointment->service->nome }}**. <br/>
Data: **{{ $appointment->data->format('d/m/Y') }}** das **{{ $appointment->inicio->format('H:i') }}** às **{{ $appointment->fim->format('H:i') }}**. <br/> 
Valor: **R$ {{ $appointment->preco }}**. <br/>
Saldo: **{{ $appointment->situacao }}**. <br/>

Clique no botão abaixo para visualizá-lo.

@component('mail::button', ['url' => "$path/appointments/$appointment->id/printReceipt"])
Baixar Recibo
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent