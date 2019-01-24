@extends('layouts.template')

@section('navtitle', 'Compromissos')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações do Compromisso</h4>
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/appointments/{{ $appointment->id }}">
                            @method('DELETE')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->client->nome }} {{ $appointment->client->sobrenome }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serviço</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->service->nome }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->data ? $appointment->data->format('d/m/Y') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora Inicial</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->inicio ? \Carbon\Carbon::parse($appointment->inicio)->format('H:i') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora Final</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->fim ? \Carbon\Carbon::parse($appointment->fim)->format('H:i') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->preco }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <input type="text" class="form-control border-input" value="{{ $appointment->situacao }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea type="text" class="form-control border-input" disabled>{{ $appointment->observacao }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-arrow-left"></i> Voltar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-fill">Excluir <i class="fa fa-trash"></i></button>
                                <a href="/appointments/{{ $appointment->id }}/edit" class="btn btn-danger btn-fill" type="button">
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