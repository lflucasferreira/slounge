@extends('layouts.template')

@section('navtitle', 'Pontuações')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="pull-left">
                            <h4 class="title">Pontuações</h4>
                            <p class="category">   
                                @if ($rewards_total > 1) 
                                    Total de {{ $rewards_total }} pontuações 
                                @elseif ($rewards_total === 1) 
                                    Total de {{ $rewards_total }} pontuação
                                @else 
                                    Nenhum pontuação ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('rewards.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                Adicionar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Pontos</th>
                                    <th>Validade</th>
                                    <th>Usuário</th>
                                    <th>Situação</th>
                                    <th>Condição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($rewards as $reward)
                                <tr>
                                    <td>{{ $reward->appointment->client->nome }} {{ $reward->appointment->client->sobrenome }}</td>
                                    <td>{{ $reward->pontos }}</td>
                                    <td>{{ $reward->validade ? $reward->validade->format('d/m/Y') : 'Indeterminado' }}</td>
                                    <td>{{ $reward->user->name }}</td>
                                    <td>{{ $reward->status === 1 ? 'Ativo' : 'Inativo' }}</td>
                                    <td>{{ $reward->resgatado === 0 ? 'Disponível' : 'Resgatado' }}</td>
                                    <td>
                                        <a href="/rewards/{{ $reward->id }}" class="btn btn-primary" type="button" title="Visualizar">
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
                    {{ $rewards->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection