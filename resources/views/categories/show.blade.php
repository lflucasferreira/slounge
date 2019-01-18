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
                    </div>
                    <div class="content">
                        <form action="/categories/{{ $category->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" maxlength="255" class="form-control border-input" name="nome" value="{{ $category->nome }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-fill" type="button">
                                    <i class="fa fa-arrow-left"></i> Voltar 
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-fill">Excluir <i class="fa fa-trash"></i></button>
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-danger btn-fill" type="button">
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