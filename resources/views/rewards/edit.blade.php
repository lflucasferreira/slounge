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
                        <form method="post" action="/rewards/{{ $reward->id }}">
                            @method('PATCH')   
                            @csrf
                            <input type="hidden" name="id" value="{{ $reward->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control border-input {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" required autofocus>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if(old('client_id', $reward->client_id) == $client->id) selected @endif>{{ $client->nome }} {{ $client->sobrenome }}</option>
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
                                            <option value="">Nenhum</option>
                                            @foreach ($appointments as $appointment)
                                            <option value="{{ $appointment->id }}" @if( old('appointment_id', $reward->appointment_id) == $appointment->id ) selected @endif>ID: {{ $appointment->id }} | {{ $appointment->client->nome }} {{ $appointment->client->sobrenome }} | {{ $appointment->inicio->format('d/m/Y') }} às {{ $appointment->inicio->format('H:i') }}</option>
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
                                        <input type="number" maxlength="8" class="form-control border-input  {{ $errors->has('pontos') ? 'is-invalid' : '' }}" name="pontos" value="{{ $reward->pontos ? $reward->pontos : null }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" maxlength="4" class="form-control border-input  {{ $errors->has('data') ? 'is-invalid' : '' }}" name="data" value="{{ $reward->validade ? $reward->validade->format('Y-m-d') : null }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="time" maxlength="4" class="form-control border-input  {{ $errors->has('hora') ? 'is-invalid' : '' }}" name="hora" value="{{ $reward->validade ? \Carbon\Carbon::parse($reward->validade)->format('H:i') : null }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if( old('status', $reward->status) == '1' ) selected @endif>Ativo</option>
                                            <option value="0" @if( old('status', $reward->status) == '0' ) selected @endif>Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Condição</label>
                                        <select class="form-control border-input {{ $errors->has('resgatado') ? 'is-invalid' : '' }}" name="resgatado" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if( old('resgatado', $reward->resgatado) == '1' ) selected @endif>Disponível</option>
                                            <option value="0" @if( old('resgatado', $reward->resgatado) == '0' ) selected @endif>Resgatado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('observacao') ? 'is-invalid' : '' }}" name="observacao">{{ $reward->observacao }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="/rewards/{{ $reward->id }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-close"></i> Cancelar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-danger btn-fill">Atualizar <i class="fa fa-check"></i></button>
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