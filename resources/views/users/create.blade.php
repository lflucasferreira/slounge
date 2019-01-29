{{-- {!! dd('na view', $client) !!} --}}

@extends('layouts.template')

@section('navtitle', 'Usuários')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações do Usuário</h4>
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/users">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ isset($client) ? $client->nome . ' ' . $client->sobrenome : old('name') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ isset($client) ? $client->email : old('email')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('users.index') }}" class="btn btn-primary dim btn-outline" type="button">
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