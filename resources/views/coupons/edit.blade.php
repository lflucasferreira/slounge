@extends('layouts.template')

@section('navtitle', 'Cupons')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações do Cupom</h4>
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/coupons/{{ $coupon->id }}">
                            @method('PATCH')   
                            @csrf
                            <input type="hidden" name="id" value="{{ $coupon->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <input type="text" class="form-control border-input {{ $errors->has('descricao') ? 'is-invalid' : '' }}" name="descricao" value="{{ $coupon->descricao }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <input type="text" class="form-control border-input{{ $errors->has('codigo') ? 'is-invalid' : '' }}" name="codigo" value="{{ $coupon->codigo }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control border-input {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" required>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if(old('client_id', $coupon->client_id) == $client->id) selected @endif>{{ $client->nome }} {{ $client->sobrenome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <select class="form-control border-input {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" required>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if( old('user_id', $coupon->user_id) == $user->id ) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" maxlength="8" class="form-control border-input {{ $errors->has('validade') ? 'is-invalid' : '' }}" name="validade" value="{{ $coupon->validade ? $coupon->validade->format('Y-m-d') : null }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pontos</label>
                                        <input type="number" maxlength="8" class="form-control border-input {{ $errors->has('pontos') ? 'is-invalid' : '' }}" name="pontos" value="{{ $coupon->pontos }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="number" maxlength="8" class="form-control border-input {{ $errors->has('valor') ? 'is-invalid' : '' }}" name="valor" value="{{ $coupon->valor }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if( old('status', $coupon->status) == '1' ) selected @endif>Ativo</option>
                                            <option value="0" @if( old('status', $coupon->status) == '0' ) selected @endif>Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Condição</label>
                                        <select class="form-control border-input {{ $errors->has('aplicado') ? 'is-invalid' : '' }}" name="aplicado" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if( old('aplicado', $coupon->aplicado) == '1' ) selected @endif>Aplicado</option>
                                            <option value="0" @if( old('aplicado', $coupon->aplicado) == '0' ) selected @endif>Disponível</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="pull-left">
                                <a href="/coupons/{{ $coupon->id }}" class="btn btn-primary btn-fill" type="button">
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