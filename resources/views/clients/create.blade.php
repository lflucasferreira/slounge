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
                                        <input type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" value="{{ old('nome')}}" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('sobrenome') ? 'is-invalid' : '' }}" name="sobrenome" value="{{ old('sobrenome')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" maxlength="255" class="form-control border-input  {{ $errors->has('endereco') ? 'is-invalid' : '' }}" name="endereco" value="{{ old('endereco')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" maxlength="255" class="form-control border-input  {{ $errors->has('complemento') ? 'is-invalid' : '' }}" name="complemento" value="{{ old('complemento')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Edifício</label>
                                        <input type="text" maxlength="255" class="form-control border-input  {{ $errors->has('edificio') ? 'is-invalid' : '' }}" name="edificio" value="{{ old('edificio')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" maxlength="255" class="form-control border-input  {{ $errors->has('bairro') ? 'is-invalid' : '' }}" name="bairro" value="{{ old('bairro')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" maxlength="255" class="form-control border-input  {{ $errors->has('cidade') ? 'is-invalid' : '' }}" name="cidade" value="{{ old('cidade')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="number" minLength="8" maxlength="8" class="form-control border-input  {{ $errors->has('cep') ? 'is-invalid' : '' }}" name="cep" value="{{ old('cep')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" maxlength="50" class="form-control border-input  {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" value="{{ old('estado')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" maxlength="10" class="form-control border-input  {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}" name="data_nascimento" value="{{ old('data_nascimento')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" maxlength="255" class="form-control border-input  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if(old('status') == '1') selected @endif>Ativo</option>
                                            <option value="0" @if(old('status') == '0') selected @endif>Inativo</option>
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
                                        <input type="tel" maxlength="11" class="form-control border-input {{ $errors->has('telefone_fixo') ? 'is-invalid' : '' }}" name="telefone_fixo" value="{{ old('telefone_fixo')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular/WhatsApp</label>
                                        <input type="tel" maxlength="11" class="form-control border-input {{ $errors->has('telefone_celular') ? 'is-invalid' : '' }}" name="telefone_celular" value="{{ old('telefone_celular')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Comercial</label>
                                        <input type="tel" maxlength="11" class="form-control border-input {{ $errors->has('telefone_comercial') ? 'is-invalid' : '' }}" name="telefone_comercial" value="{{ old('telefone_comercial')}}">
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
                                        <input type="number" maxlength="11" class="form-control border-input {{ $errors->has('cpf') ? 'is-invalid' : '' }}" name="cpf" value="{{ old('cpf')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input type="number" maxlength="11" class="form-control border-input {{ $errors->has('rg') ? 'is-invalid' : '' }}" name="rg" value="{{ old('rg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Órgão Expedidor</label>
                                        <input type="text" maxlength="10" class="form-control border-input {{ $errors->has('orgao') ? 'is-invalid' : '' }}" name="orgao" value="{{ old('orgao')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('clients.index') }}" class="btn btn-primary dim btn-outline" type="button">
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