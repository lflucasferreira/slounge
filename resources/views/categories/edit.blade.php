@extends('layouts.template')

@section('navtitle', 'Categorias')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Categoria</h4>
                        @include('errors')
                    </div>
                    <div class="content">
                        <form method="post" action="/categories/{{ $category->id }}">
                            @method('PATCH')   
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" maxlength="255" class="form-control border-input {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" value="{{ $category->nome }}" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="/categories/{{ $category->id }}" class="btn btn-primary btn-fill" type="button">
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