<div class="sidebar" data-background-color="black" data-active-color="warning">

<!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text">
                SLOUNGE
            </a>
        </div>

        <ul class="nav">
            {{-- <li class="{{ isActiveRoute('home') }}">
                <a href="{{ url('/') }}">
                    <i class="ti-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li> --}}
            {{-- <li class="{{ isActiveRoute('premiums.index') }}">
                <a href="{{ url('/premiums') }}">
                    <i class="ti-star"></i>
                    <p>Premium</p>
                </a>
            </li> --}}
            <li class="{{ isActiveRoute('appointments.index') }}">
                <a href="{{ url('/appointments') }}">
                    <i class="ti-calendar"></i>
                    <p>Agenda</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('categories.index') }}">
                <a href="{{ url('/categories') }}">
                    <i class="ti-tag"></i>
                    <p>Categorias</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('clients.index') }}">
                <a href="{{ url('/clients') }}">
                    <i class="ti-crown"></i>
                    <p>Clientes</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('coupons.index') }}">
                <a href="{{ url('/coupons') }}">
                    <i class="ti-ticket"></i>
                    <p>Cupons</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('wallets.index') }}">
                <a href="{{ url('/wallets') }}">
                    <i class="ti-wallet"></i>
                    <p>Financeiro</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('rewards.index') }}">
                <a href="{{ url('/rewards') }}">
                    <i class="ti-cup"></i>
                    <p>Pontuação</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('services.index') }}">
                <a href="{{ url('/services') }}">
                    <i class="ti-briefcase"></i>
                    <p>Serviços</p>
                </a>
            </li>
            <li class="{{ isActiveRoute('users.index') }}">
                <a href="{{ url('/users') }}">
                    <i class="ti-user"></i>
                    <p>Usuários</p>
                </a>
            </li>
        </ul>
    </div>
</div>