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
                        <form method="post" action="/services">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código SKU</label>
                                        <input type="text" minLength="3" maxlength="10" class="form-control border-input  {{ $errors->has('sku') ? 'is-invalid' : '' }}" name="sku" value="{{ old('sku')}}" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" value="{{ old('nome')}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('descricao') ? 'is-invalid' : '' }}" name="descricao">{{ old('descricao')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input type="number" maxlength="255" class="form-control border-input  {{ $errors->has('preco') ? 'is-invalid' : '' }}" name="preco" value="{{ old('preco')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Duração</label>
                                        <input type="time" maxlength="255" class="form-control border-input  {{ $errors->has('duracao') ? 'is-invalid' : '' }}" name="duracao" value="{{ old('duracao')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Validade Inicial</label>
                                        <input type="date" maxlength="255" class="form-control border-input  {{ $errors->has('inicio') ? 'is-invalid' : '' }}" name="inicio" value="{{ old('inicio')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Validade Final</label>
                                        <input type="date" maxlength="255" class="form-control border-input  {{ $errors->has('fim') ? 'is-invalid' : '' }}" name="fim" value="{{ old('fim')}}">
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
                                            <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->name }}</option>
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
                                            <option value="{{ $categoria->id }}" @if(old('category_id') == $categoria->id) selected @endif>{{ $categoria->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('services.index') }}" class="btn btn-primary dim btn-outline" type="button">
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