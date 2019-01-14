@extends('layouts.template')

@section('navtitle', 'Dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <a href="{{ route('clients.index')}}" style="color: #000;text-decoration: none;">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-crown"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Clientes</p>
                                        {{ $clients }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-star"></i> Ana Delgado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <a href="{{ route('wallets.index')}}" style="color: #000;text-decoration: none;">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-wallet"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Financeiro</p>
                                        R$ 150
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-pulse"></i> R$ 450,00 [R$ 56,25]
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <a href="{{ route('appointments.index')}}" style="color: #000;text-decoration: none;">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-calendar"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Agenda</p>
                                        {{ $appointments }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-hand-point-right"></i> 14/01 às 10:00 (2 dias)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <a href="{{ route('rewards.index')}}" style="color: #000;text-decoration: none;">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-cup"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Pontuação</p>
                                        +350
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-exchange-vertical"></i> Grináuria +100
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection