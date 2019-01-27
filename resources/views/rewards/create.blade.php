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
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/rewards">
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
                                @if($appointments->count() > 0)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Compromisso (se houver)</label>
                                        <select class="form-control border-input {{ $errors->has('appointment_id') ? 'is-invalid' : '' }}" name="appointment_id">
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($appointments as $appointment)
                                            <option value="{{ $appointment->id }}" @if(old('appointment_id') == $appointment->id) selected @endif>{{ $appointment->id }} | {{ $appointment->client->nome }} {{ $appointment->client->sobrenome }} | {{ $appointment->inicio }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pontos</label>
                                        <input type="number" maxlength="8" class="form-control border-input  {{ $errors->has('pontos') ? 'is-invalid' : '' }}" name="pontos" value="{{ old('pontos') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" maxlength="8" class="form-control border-input  {{ $errors->has('data') ? 'is-invalid' : '' }}" name="data" value="{{ old('data') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="time" maxlength="8" class="form-control border-input  {{ $errors->has('hora') ? 'is-invalid' : '' }}" name="hora" value="{{ old('hora') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if( old('status') == '1' ) selected @endif>Ativo</option>
                                            <option value="0" @if( old('status') == '0' ) selected @endif>Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Condição</label>
                                        <select class="form-control border-input {{ $errors->has('resgatado') ? 'is-invalid' : '' }}" name="resgatado" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if( old('resgatado') == '1' ) selected @endif>Disponível</option>
                                            <option value="0" @if( old('resgatado') == '0' ) selected @endif>Resgatado</option>
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
                                <a href="{{ route('rewards.index') }}" class="btn btn-primary dim btn-outline" type="button">
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