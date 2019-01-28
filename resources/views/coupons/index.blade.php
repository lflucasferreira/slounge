@extends('layouts.template')

@section('navtitle', 'Cupons')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="pull-left">
                            <h4 class="title">Cupons</h4>
                            <p class="category">   
                                @if ($coupons_total > 1) 
                                    Total de {{ $coupons_total }} cupons 
                                @elseif ($coupons_total === 1) 
                                    Total de {{ $coupons_total }} cupom
                                @else 
                                    Nenhum cupom ainda 
                                @endif
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('coupons.create') }}" class="btn btn-danger dim btn-outline" type="button">
                                Adicionar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Código</th>
                                    <th>Validade</th>
                                    <th>Valor</th>
                                    <th>Pontos</th>
                                    <th>Situação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->client->nome }} {{ $coupon->client->sobrenome }}</td>
                                    <td>{{ $coupon->codigo }}</td>
                                    <td>{{ $coupon->validade ? $coupon->validade->format('d/m/Y') : 'Indeterminado' }}</td>
                                    <td>R$ {{ $coupon->valor }}</td>
                                    <td>{{ $coupon->pontos ? $coupon->pontos : null}}</td>
                                    <td>{{ $coupon->status === 1 ? 'Ativo' : 'Inativo' }}</td>
                                    <td>
                                        <a href="/coupons/{{ $coupon->id }}" class="btn btn-primary" type="button" title="Visualizar">
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
                    {{ $coupons->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection