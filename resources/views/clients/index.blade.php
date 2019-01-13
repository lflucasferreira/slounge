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
                            <h4 class="title">Clientes Ativos</h4>
                            <p class="category">   
                                @if ($clients->count() > 1) 
                                    Total de {{ $clients->count() }} clientes 
                                @elseif ($clients->count() === 1) 
                                    Total de {{ $clients->count() }} cliente  
                                @else 
                                    Nenhum cliente ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                <i class="fa fa-plus"></i> Novo Cliente 
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr><th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Bairro</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr></thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->nome }} {{ $client->sobrenome }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->bairro }}</td>
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
            </div>
        </div>
    </div>
</div>


@endsection