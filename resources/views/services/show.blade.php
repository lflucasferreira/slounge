@extends('layouts.template')

@section('navtitle', 'Serviços')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações do Serviço</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/services/{{ $service->id }}">
                            @method('DELETE')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código SKU</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->sku }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->nome }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea type="text" class="form-control border-input" disabled>{{ $service->descricao }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input type="number" class="form-control border-input" value="{{ $service->preco }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Duração</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->duracao ? \Carbon\Carbon::parse($service->duracao)->format('H:i') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Validade Inicial</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->inicio ? $service->inicio->format('d/m/Y') : null }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Validade Final</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->fim ? $service->fim->format('d/m/Y') : null }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->user->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <input type="text" class="form-control border-input" value="{{ $service->category->nome }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('services.index') }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-arrow-left"></i> Voltar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-fill">Excluir <i class="fa fa-trash"></i></button>
                                <a href="/services/{{ $service->id }}/edit" class="btn btn-danger btn-fill" type="button">
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