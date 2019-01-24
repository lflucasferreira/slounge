@extends('layouts.template')

@section('navtitle', 'Compromissos')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="pull-left">
                            <h4 class="title">Compromissos</h4>
                            <p class="category">   
                                @if ($appointments_total > 1) 
                                    Total de {{ $appointments_total }} compromissos 
                                @elseif ($appointments_total === 1) 
                                    Total de {{ $appointments_total }} compromisso  
                                @else 
                                    Nenhum compromisso ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('appointments.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                Adicionar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Serviço</th>
                                    <th>Data</th>
                                    <th>Horário</th>
                                    <th>Preço</th>
                                    <th>Situação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->client->nome }} {{ $appointment->client->sobrenome }}</td>
                                    <td>{{ $appointment->service->nome }}</td>
                                    <td>{{ $appointment->data ? $appointment->data->format('d/m/Y') : null }}</td>
                                    <td>{{ $appointment->inicio ? \Carbon\Carbon::parse($appointment->inicio)->format('H:i') : null}} às 
                                        {{ $appointment->fim ? \Carbon\Carbon::parse($appointment->fim)->format('H:i') : null}}
                                    </td>
                                    <td>R$ {{ $appointment->preco }}</td>
                                    <td>{{ $appointment->situacao }}</td>
                                    <td>
                                        <a href="/appointments/{{ $appointment->id }}" class="btn btn-primary" type="button" title="Visualizar">
                                            <i class="fa fa-eye"></i> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row text-center">
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection