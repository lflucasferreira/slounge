@extends('layouts.template')

@section('navtitle', 'Clientes')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="pull-left">
                            <h4 class="title">Clientes</h4>
                            <p class="category">   
                                @if ($clients_total > 1) 
                                    Total de {{ $clients_total }} clientes 
                                @elseif ($clients_total === 1) 
                                    Total de {{ $clients_total }} cliente  
                                @else 
                                    Nenhum cliente ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                Adicionar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Cidade</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->nome }} {{ $client->sobrenome }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->cidade }}</td>
                                    <td>{{ $client->telefone_celular }}</td>
                                    <td>
                                        <a href="/clients/{{ $client->id }}" class="btn btn-primary" type="button" title="Visualizar">
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
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection