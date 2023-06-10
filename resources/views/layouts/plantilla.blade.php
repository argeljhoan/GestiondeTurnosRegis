<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <title>Sistema de Gestion de Turnos</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script async src="{{ asset('images/js') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-RYQ32W3PHF');
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    Sistema de Gestion de Turnos
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @can('admin.home')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('admin.home') }}">Inicio <span class="sr-only"></span></a>
                        </li>
                        @endcan
                        @can('admin.Gestion')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.Gestion') }}">Gestion De Operadores</a>
                        </li>
                        @endcan
                        @can('Modulos.Gestion')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Modulos.Gestion') }}">Gestion de Modulos</a>
                        </li>
                        @endcan
                        @can('Tramites.Gestion')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Tramites.Gestion') }}">Gestion de Tramites</a>
                        </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gestion de Turnos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @can('Turnos.Gestion')
                                <a class="dropdown-item" href="{{ route('Turnos.Gestion') }}">Buscar</a>
                                @endcan
                                @can('Turnos.Registrar')
                                <a class="dropdown-item" href="{{ route('Turnos.Registrar') }}">Solicitar Turno</a>
                                @endcan
                                @can('Turnos.Cargar')
                                <a class="dropdown-item" href="{{ route('Turnos.Cargar') }}">Cargar Citas</a>
                                @endcan
                                @can('Turnos.Operadores')
                                <a class="dropdown-item" href="{{ route('Turnos.Operadores', Auth::user()->id) }}">Tabla de Citas</a>
                                @endcan
                                @can('Turnos.Atencion')
                                <a class="dropdown-item" href="{{ route('Turnos.Atencion',['id' => Auth::user()->id, 'cita' => '0'])}}">Atencion al Usuario</a>
                                @endcan
                                @can('Turnos.Visualizar')
                                <a class="dropdown-item" href="{{ route('Turnos.Visualizar')}}">Visualizar Turnos</a>
                                @endcan
                                @can('Turnos.Digital')
                                <a class="dropdown-item" href="{{ route('Turnos.Digital')}}">Cedulas Digitales</a>
                                @endcan
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.Gestion') }}">Informes</a>
                        </li>


                        @guest
                            <!-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif -->

                            <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content1')
        </main>
    </div>

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            // Selecciona el elemento con la clase 'dropdown-toggle' y agrega el evento de clic
            $('.dropdown-toggle').click(function () {
                // Obtiene el menú desplegable asociado al elemento clicado
                var dropdownMenu = $(this).next('.dropdown-menu');

                // Verifica si el menú está oculto o visible y lo alterna
                dropdownMenu.toggle();
            });
        });
    </script>
</body>
</html>