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
                    </div>
                    <div class="content">
                        <form method="post" action="/coupons/{{ $coupon->id }}">
                            @method('DELETE')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <input type="text" class="form-control border-input" value="{{ $coupon->descricao }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <input type="text" class="form-control border-input" value="{{ $coupon->codigo }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <input type="text" class="form-control border-input" value="{{ $coupon->client->nome }} {{ $coupon->client->sobrenome }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <input type="text" class="form-control border-input" value="{{ $coupon->user->name }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="text" maxlength="8" class="form-control border-input" value="{{ $coupon->validade ? $coupon->validade->format('d/m/Y') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pontos</label>
                                        <input type="text" maxlength="8" class="form-control border-input" value="{{ $coupon->pontos }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="text" maxlength="8" class="form-control border-input" value="{{ $coupon->valor }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <input type="text" class="form-control border-input" value="{{ $coupon->status ? 'Ativo' : 'Inativo' }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Condição</label>
                                        <input type="text" class="form-control border-input" value="{{ $coupon->aplicado ? 'Aplicado' : 'Disponível' }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="pull-left">
                                <a href="{{ route('coupons.index') }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-arrow-left"></i> Voltar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-fill">Excluir <i class="fa fa-trash"></i></button>
                                <a href="/coupons/{{ $coupon->id }}/edit" class="btn btn-danger btn-fill" type="button">
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