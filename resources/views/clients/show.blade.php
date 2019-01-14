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
                    </div>
                    <div class="content">
                        <form action="/clients/{{ $client->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="nome" value="{{ $client->nome }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="sobrenome" value="{{ $client->sobrenome }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="endereco" value="{{ $client->endereco }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="complemento" value="{{ $client->complemento }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Edifício</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="edificio" value="{{ $client->edificio }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="bairro" value="{{ $client->bairro }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="cidade" value="{{ $client->cidade }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" maxlength="8" class="form-control border-input" name="cep" value="{{ $client->cep }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" maxlength="50" class="form-control border-input" name="estado" value="{{ $client->estado }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control border-input" name="data_nascimento" value="{{ $client->data_nascimento }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" maxlength="255" class="form-control border-input" name="email" value="{{ $client->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input" name="status" disabled>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if(old('status', $client->status) == '1') selected @endif>Ativo</option>
                                            <option value="0" @if(old('status', $client->status) == '0') selected @endif>Inativo</option>
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
                                        <input type="tel" maxlength="11" class="form-control border-input" name="telefone_fixo" value="{{ $client->telefone_fixo }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular/WhatsApp</label>
                                        <input type="tel" maxlength="11" class="form-control border-input" name="telefone_celular" value="{{ $client->telefone_celular }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Comercial</label>
                                        <input type="tel" maxlength="11" class="form-control border-input" name="telefone_comercial" value="{{ $client->telefone_comercial }}" disabled>
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
                                        <input type="text" maxlength="11" class="form-control border-input" name="cpf" value="{{ $client->cpf }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input type="text" maxlength="10" class="form-control border-input" name="rg" value="{{ $client->rg }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Órgão Expedidor</label>
                                        <input type="text" maxlength="10" class="form-control border-input" name="orgao" value="{{ $client->orgao }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('clients.index') }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-arrow-left"></i> Voltar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-fill">Excluir <i class="fa fa-trash"></i></button>
                                <a href="/clients/{{ $client->id }}/edit" class="btn btn-danger btn-fill" type="button">
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