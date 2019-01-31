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
                        <form method="post" action="/appointments">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control border-input {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" required autofocus>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if(old('client_id') == $client->id) selected @endif>{{ $client->nome }} {{ $client->sobrenome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serviço</label>
                                        <select class="form-control border-input {{ $errors->has('service_id') ? 'is-invalid' : '' }}" name="service_id" required>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($services as $service)
                                            <option value="{{ $service->id }}" @if(old('service_id') == $service->id) selected @endif>{{ $service->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" maxlength="8" class="form-control border-input  {{ $errors->has('data') ? 'is-invalid' : '' }}" name="data" value="{{ old('data') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora Inicial</label>
                                        <input type="time" maxlength="4" class="form-control border-input  {{ $errors->has('inicio') ? 'is-invalid' : '' }}" name="inicio" value="{{ old('inicio') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora Final</label>
                                        <input type="time" maxlength="4" class="form-control border-input  {{ $errors->has('fim') ? 'is-invalid' : '' }}" name="fim" value="{{ old('fim') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input type="number" step="0.01" maxlength="8" class="form-control border-input  {{ $errors->has('preco') ? 'is-invalid' : '' }}" name="preco" value="{{ old('preco') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input {{ $errors->has('situacao') ? 'is-invalid' : '' }}" name="situacao" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="Agendado" @if( old('situacao') == 'Agendado' ) selected @endif>Agendado</option>
                                            <option value="Cancelado" @if( old('situacao') == 'Cancelado' ) selected @endif>Cancelado</option>
                                            <option value="Concluído" @if( old('situacao') == 'Concluído' ) selected @endif>Concluído</option>
                                            <option value="Confirmado" @if( old('situacao') == 'Confirmado' ) selected @endif>Confirmado</option>
                                            <option value="Reagendado" @if( old('situacao') == 'Reagendado' ) selected @endif>Reagendado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('observacao') ? 'is-invalid' : '' }}" name="observacao">{{ old('observacao')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="pull-left">
                                <a href="{{ route('appointments.index') }}" class="btn btn-primary dim btn-outline" type="button">
                                    <i class="fa fa-close"></i> Cancelar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-danger btn-fill btn-wd">Cadastrar <i class="fa fa-check"></i></button>
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