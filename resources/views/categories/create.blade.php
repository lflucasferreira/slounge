@extends('layouts.template')

@section('navtitle', 'Categorias')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informações da Categoria</h4>
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/categories">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" minLength="3" maxlength="255" class="form-control border-input  {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" value="{{ old('nome')}}" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <select class="form-control border-input {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required>
                                            <option value="" hidden>Selecionar</option>
                                            <option value="1" @if(old('status') == '1') selected @endif>Ativa</option>
                                            <option value="0" @if(old('status') == '0') selected @endif>Inativa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="pull-left">
                                <a href="{{ route('categories.index') }}" class="btn btn-primary dim btn-outline" type="button">
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