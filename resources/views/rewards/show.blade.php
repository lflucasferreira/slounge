@extends('layouts.template')

@section('navtitle', 'Pontuações')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações da Pontuação</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/rewards/{{ $reward->id }}">
                            @method('DELETE')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <input type="text" class="form-control border-input" value="{{ $reward->client->nome }} {{ $reward->client->sobrenome }}" disabled>
                                    </div>
                                </div>
                                @if(!is_null($appointment))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Compromisso</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->id }} | {{ $appointment->client->nome }} {{ $appointment->client->sobrenome }} | {{ $appointment->inicio }}" disabled>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pontos</label>
                                        <input type="text" maxlength="8" class="form-control border-input" value="{{ $reward->pontos }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="text" maxlength="8" class="form-control border-input" value="{{ $reward->validade ? $reward->validade->format('d/m/Y') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="text" class="form-control border-input" value="{{ $reward->validade ? \Carbon\Carbon::parse($reward->validade)->format('H:i') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <input type="text" class="form-control border-input" value="{{ $reward->status ? 'Ativo' : 'Inativo' }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Condição</label>
                                        <input type="text" class="form-control border-input" value="{{ $reward->resgatado ? 'Disponível' : 'Resgatado' }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea type="text" class="form-control border-input" disabled>{{ $reward->observacao }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('rewards.index') }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-arrow-left"></i> Voltar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-fill">Excluir <i class="fa fa-trash"></i></button>
                                <a href="/rewards/{{ $reward->id }}/edit" class="btn btn-danger btn-fill" type="button">
                                    Editar <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection