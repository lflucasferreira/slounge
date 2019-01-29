@extends('layouts.template')

@section('navtitle', 'Serviços')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="pull-left">
                            <h4 class="title">Serviços</h4>
                            <p class="category">   
                                @if ($services_total > 1) 
                                    Total de {{ $services_total }} serviços 
                                @elseif ($services_total === 1) 
                                    Total de {{ $services_total }} serviço  
                                @else 
                                    Nenhum serviço ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('services.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                Adicionar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Usuário</th>
                                    <th>Preço</th>
                                    <th>Duração</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->sku }}</td>
                                    <td>{{ $service->nome }}</td>
                                    <td>{{ $service->category->nome }}</td>
                                    <td>{{ $service->user->name }}</td>
                                    <td>{{ $service->preco ? 'R$ ' . $service->preco : '-' }}</td>
                                    <td>{{ $service->duracao ? \Carbon\Carbon::parse($service->duracao)->format('H:i') : '-' }}</td>
                                    <td>
                                        <a href="/services/{{ $service->id }}" class="btn btn-primary" type="button" title="Visualizar">
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
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection