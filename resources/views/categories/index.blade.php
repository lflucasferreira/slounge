@extends('layouts.template')

@section('navtitle', 'Categorias')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="pull-left">
                            <h4 class="title">Categorias</h4>
                            <p class="category">   
                                @if ($categories_total > 1) 
                                    Total de {{ $categories_total }} categorias 
                                @elseif ($categories_total === 1) 
                                    Total de {{ $categories_total }} categoria  
                                @else 
                                    Nenhuma categoria ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('categories.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                Adicionar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->nome }}</td>
                                    <td>
                                        <a href="/categories/{{ $category->id }}" class="btn btn-primary" type="button" title="Visualizar">
                                            <i class="fa fa-eye"></i> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row text-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection