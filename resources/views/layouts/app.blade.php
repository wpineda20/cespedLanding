<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Base') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}" defer></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/sidebar.js') }}" defer></script>
    @auth
    <script src="{{ mix('js/dropdown.js') }}" defer></script>
    @endauth

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/Favicon.png') }}">
    @yield('css')

    @yield('header')
</head>

<body>
    <div id="app" class="app-container">
        <aside class="animate__animated animate__faster aside">
            <div class="top">
                <div class="logo">
                    <img src="{{ asset('logos/logo.svg') }}" alt="" />
                </div>
                <div class="close close-btn">
                    <a href="#">
                        <span class="material-icons"> close </span>
                    </a>
                </div>
            </div>

            <div class="sidebar">
                @auth
                {{-- <a href="#" class="active option-menu"> --}}
                    <a href="/home" class="option-menu">
                        <span class="material-icons">dashboard</span>
                        <h3>Dashboard</h3>
                    </a>
                    <a href="/customer" class="option-menu">
                        <span class="material-icons">person</span>
                        <h3>Clientes</h3>
                    </a>
                    {{-- Bodega --}}
                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Bodega</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/category') }}">Categorías</a></li>
                            <li><a href="{{ url('/presentation') }}">Presentaciones</a></li>
                            <li><a href="{{ url('/brand') }}">Marcas</a></li>
                            <li><a href="{{ url('/product') }}">Productos</a></li>
                        </ul>
                    </li>
                    {{-- Bodega --}}

                    {{-- Inventario --}}
                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Inventario</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/departments ') }}">Proveedores</a></li>
                            <li><a href="{{ url('/municipalities') }}">Inventario</a></li>
                            <li><a href="{{ url('/municipalities') }}">Traslado de productos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Salidas de productos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Garantías</a></li>
                            <li><a href="{{ url('/municipalities') }}">Licenciamientos</a></li>
                        </ul>
                    </li>
                    {{-- Inventario --}}

                    {{-- Facturacion --}}
                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Facturación</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/departments ') }}">Apertura de caja</a></li>
                            <li><a href="{{ url('/municipalities') }}">Cotizaciones</a></li>
                            <li><a href="{{ url('/municipalities') }}">Terminal de caja</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de cajas</a></li>
                        </ul>
                    </li>
                    {{-- Facturacion --}}

                    {{-- Gestión de soporte de tickets --}}
                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Facturación</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/departments ') }}">Gestión y seguimiento de tickets</a></li>
                        </ul>
                    </li>
                    {{-- Gestión de soporte de tickets --}}

                    {{-- Contabilidad --}}
                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Contabilidad</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/departments ') }}">Bancos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Tarjetas</a></li>
                            <li><a href="{{ url('/users') }}">Cuentas por cobrar</a></li>
                            <li><a href="{{ url('/municipalities') }}">Cuentas por pagar</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de compras</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de ventas</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de gastos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Presupuesto anual</a></li>
                        </ul>
                    </li>
                    {{-- Contabilidad --}}

                    {{-- Recursos humanos --}}
                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Recursos humanos</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/departments ') }}">Empleados</a></li>
                            <li><a href="{{ url('/municipalities') }}">Departamentos laborales</a></li>
                            <li><a href="{{ url('/municipalities') }}">Cargos y funciones</a></li>
                            <li><a href="{{ url('/municipalities') }}">Planilla</a></li>
                        </ul>
                    </li>
                    {{-- Recursos humanos --}}

                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Administración</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/municipalities') }}">Países</a></li>
                            <li><a href="{{ url('/departments ') }}">Departamentos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Municipios</a></li>
                            <li><a href="{{ url('/municipalities') }}">Sucursales</a></li>
                            <li><a href="{{ url('/municipalities') }}">Cargos</a></li>
                            <li><a href="{{ url('/role') }}">Roles</a></li>
                            <li><a href="{{ url('/user') }}">Usuarios</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-sidebar">
                        <a href="#" class=" option-menu">
                            <span class="material-icons">settings</span>
                            <h3>Contabilidad</h3>
                        </a>
                        <ul class="sub-menu animate__animated animate__faster animate__fadeIn">
                            <li><a href="{{ url('/departments ') }}">Bancos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Tarjetas</a></li>
                            <li><a href="{{ url('/users') }}">Cuentas por cobrar</a></li>
                            <li><a href="{{ url('/municipalities') }}">Cuentas por pagar</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de compras</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de ventas</a></li>
                            <li><a href="{{ url('/municipalities') }}">Gestión de gastos</a></li>
                            <li><a href="{{ url('/municipalities') }}">Presupuesto anual</a></li>
                        </ul>
                    </li>

                    {{-- <a href="#" class="option-menu">
                        <span class="material-icons">receipt_long</span>
                        <h3>Ordenes</h3>
                    </a>
                    <a href="#" class="option-menu">
                        <span class="material-icons">settings</span>
                        <h3>Ajustes</h3>
                    </a>
                    <a href="{{ route('logout') }}" class="option-menu"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="material-icons">logout</span>
                        <h3>Cerrar sesión</h3>
                    </a> --}}

                    @endauth
                    @guest
                    <a href="/login" class="active option-menu">
                        <span class="material-icons">login</span>
                        <h3>Iniciar sesión</h3>
                    </a>
                    {{-- Fake button --}}
                    <a href="#" class="option-menu d-none">
                        <span class="material-icons"></span>
                        <h3></h3>
                    </a>
                    @endguest
            </div>
        </aside>

        <!-- Main -->
        <main>
            <nav>
                <div class="navbar">
                    <div class="nav-left">
                        <div class="menu">
                            <a href="#">
                                <span class="material-icons">menu</span>
                            </a>
                        </div>
                        <div class="title">
                            <h1 style="color: black">ERP</h1>
                        </div>
                    </div>
                    <div class="nav-right">
                        @auth
                        {{-- <div class="user">
                            <a href="#">
                                <span class="material-icons">person</span>
                            </a>
                        </div>
                        <div class="notifications">
                            <a href="#">
                                <span class="material-icons">notifications</span>
                            </a>
                        </div> --}}
                        <div class="user d-none d-md-block d-lg-block d-xl-block">
                            <a href="#" class="user-btn">
                                <img src="/img/sheen.webp" alt="" />
                                <span class="material-icons">expand_more</span>
                            </a>
                            <div class="dropdown-list animate__animated animate__faster">
                                <ul>
                                    <li class="profile-nav">
                                        <img class="mx-auto" src="/img/sheen.webp" alt="avatar" />
                                        <h2 class="text-center">{{ auth()->user()->name }}</h2>
                                        <h4 class="text-muted text-center">Administrador</h4>
                                        <hr />
                                    </li>
                                    <li class="p-0">
                                        <a href="{{ route('logout') }}" class="option"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar
                                            sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                </ul>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </nav>

            @yield('content')
        </main>
        <!-- Main -->

        <!-- Footer  -->
        <footer>
            <div class="footer-title">
                <h5 style="color: black">ERP &copy 2022</h5>
            </div>
            <span class="text-muted">Todos los derechos reservados.</span>
        </footer>
        <!-- Footer  -->
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>

</html>