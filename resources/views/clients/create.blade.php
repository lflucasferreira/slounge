@extends('layouts.template')

@section('navtitle', 'Clientes')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações Pessoais</h4>
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/clients">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control border-input" name="nome" value="{{ old('nome')}}" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control border-input" name="sobrenome" value="{{ old('sobrenome')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control border-input" name="endereco" value="{{ old('endereco')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control border-input" name="complemento" value="{{ old('complemento')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Edifício</label>
                                        <input type="text" class="form-control border-input" name="edificio" value="{{ old('edificio')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control border-input" name="bairro" value="{{ old('bairro')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control border-input" name="cidade" value="{{ old('cidade')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="number" min="8" max="8" class="form-control border-input" name="cep" value="{{ old('cep')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" class="form-control border-input" name="estado" value="{{ old('estado')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control border-input" name="data_nascimento" value="{{ old('data_nascimento')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control border-input" name="email" value="{{ old('email')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control" name="status">
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h4 class="title">Telefones</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Residencial</label>
                                        <input type="tel" class="form-control border-input" name="telefone_fixo" value="{{ old('telefone_fixo')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular/WhatsApp</label>
                                        <input type="tel" class="form-control border-input" name="telefone_celular" value="{{ old('telefone_celular')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Comercial</label>
                                        <input type="tel" class="form-control border-input" name="telefone_comercial" value="{{ old('telefone_comercial')}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="title">Documentação</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="number" class="form-control border-input" name="cpf" value="{{ old('cpf')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input type="number" class="form-control border-input" name="rg" value="{{ old('rg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Órgão Expedidor</label>
                                        <input type="text" class="form-control border-input" name="orgao" value="{{ old('orgao')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('clients.index') }}" class="btn btn-primary dim btn-outline" type="button">
                                    <i class="fa fa-close"></i> Cancelar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-danger btn-fill btn-wd">Cadastrar Cliente <i class="fa fa-check"></i></button>
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