<link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="compactSidebar">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" width="200px">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('img/theme/usuario.png') }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                        <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" width="250px">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categoria.index')}}">
                        <i class="ni ni-archive-2 text-blue"></i> {{ __('Categorias') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('producto.index')}}">
                        <i class="ni ni-tag text-blue"></i> {{ __('Productos') }}  
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('clientes.index')}}">
                        <i class="ni ni-single-02 text-blue "></i> {{ __('Clientes') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('pos.index')}}">
                        <i class="ni ni-shop text-blue "></i> {{ __('Vender') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ventas.index')}}">
                        <i class="ni ni-cart text-blue "></i> {{ __('Ventas') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="ni ni-key-25 text-blue"></i> {{ __('Rol') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="ni ni-lock-circle-open text-blue"></i> {{ __('Permisos') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-active-40 text-blue"></i> {{ __('Asignar') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-blue"></i> {{ __('Usuarios') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('denominacion.index')}}">
                        <i class="ni ni-money-coins text-blue"></i> {{ __('Monedas') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-book-bookmark text-blue"></i> {{ __('Arqueos') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-chart-pie-35 text-blue"></i> {{ __('Reportes') }}
                    </a>
                </li>
               
            </ul>
            <!-- Divider -->
            <hr class="my-3">
           
          
        </div>
    </div>
</nav>
