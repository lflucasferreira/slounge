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
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/services/{{ $service->id }}">
                            @method('PATCH')   
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código SKU</label>
                                        <input type="text" minLength="3" maxlength="10" class="form-control border-input  {{ $errors->has('sku') ? 'is-invalid' : '' }}" name="sku" value="{{ $service->sku }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" value="{{ $service->nome }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('descricao') ? 'is-invalid' : '' }}" name="descricao">{{ $service->descricao }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input type="number" maxlength="255" class="form-control border-input  {{ $errors->has('preco') ? 'is-invalid' : '' }}" name="preco" value="{{ $service->preco }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Duração</label>
                                        <input type="time" class="form-control border-input  {{ $errors->has('duracao') ? 'is-invalid' : '' }}" name="duracao" value="{{ $service->duracao ? \Carbon\Carbon::parse($service->duracao)->format('H:i') : null }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Validade Inicial</label>
                                        <input type="date" class="form-control border-input  {{ $errors->has('inicio') ? 'is-invalid' : '' }}" name="inicio" value="{{ $service->inicio ? $service->inicio->format('Y-m-d') : null }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Validade Final</label>
                                        <input type="date" class="form-control border-input  {{ $errors->has('fim') ? 'is-invalid' : '' }}" name="fim" value="{{ $service->fim ? $service->fim->format('Y-m-d') : null }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <select class="form-control border-input {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" required>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if(old('user_id', $service->user_id) == $user->id) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select class="form-control border-input {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" required>
                                            <option value="" hidden>Selecionar</option>
                                            @foreach ($categories as $categoria)
                                            <option value="{{ $categoria->id }}" @if(old('category_id', $service->category_id) == $categoria->id) selected @endif>{{ $categoria->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="/services/{{ $service->id }}" class="btn btn-primary btn-fill" type="button">
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