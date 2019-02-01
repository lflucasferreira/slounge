@component('mail::message')
Olá {{ $appointment->client->nome }},

Um novo compromisso foi criado para você com as seguintes informações:

Serviço: **{{ $appointment->service->nome }}**. <br/>
Data: **{{ $appointment->data->format('d/m/Y') }}** das **{{ $appointment->inicio->format('H:i') }}** às **{{ $appointment->fim->format('H:i') }}**. <br/> 
Valor: **R$ {{ $appointment->preco }}**. <br/>
Status: **{{ $appointment->situacao }}**. <br/>
Observação: **{{ $appointment->observacao ? $appointment->observacao : 'Nenhuma' }}**.

Caso queira cancelar o compromisso, clique no botão **Cancelar Compromisso** abaixo.

@component('mail::button', ['url' => "$path/appointments/$appointment->id/cancel"])
Cancelar Compromisso
@endcomponent

Até lá,<br>
{{ config('app.name') }}
@endcomponent