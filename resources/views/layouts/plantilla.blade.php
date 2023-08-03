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
                  
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.Inicio') }}">Inicio</a>
                            @can('admin.home')
                            <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard </a>
                            @endcan
                            </div>
                        </li>
                      
                        @can('admin.Gestion')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operadores
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.Gestion') }}">Gestion </a>
                            
                                <a class="dropdown-item" href="{{ route('admin.inhabilitados') }}">Operadores Inhabilitados</a>
                              
                            </div>

                        </li>
                        @endcan
                        @can('Modulos.Gestion')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Modulos
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('Modulos.Gestion') }}">Gestion </span></a>
                            
                                <a class="dropdown-item" href="{{ route('Modulos.inhabilitados',['num' => '1']) }}">Modulos Inhabilitados </a>
                              
                            </div>
                            
                        </li>
                        @endcan

                        @can('Tramites.Gestion')
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tramites
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('Tramites.Gestion') }}">Gestion </a>
                            
                                <a class="dropdown-item" href="{{ route('Tramites.inhabilitados',['num' => '2']) }}">Tramites Inhabilitados </span></a>
                              
                            </div>
                           
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

                        @can('Informes.Reportes')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Informes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('Informes.Reportes', ['num' => '1']) }}">Buscar por Fechas</a>
                                
                                <a class="dropdown-item" href="{{ route('Informes.Reportes', ['num' => '2']) }}">Buscar por Estado</a>

                                <a class="dropdown-item" href="{{ route('Informes.Reportes', ['num' => '3']) }}">Buscar por Tramite</a>

                                <a class="dropdown-item" href="{{ route('Informes.Reportes', ['num' => '4']) }}">Buscar por Modulo</a>
                            </div>
                        </li>
                        @endcan

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
            <div class="container justify-content-center">
                
                    
                        @yield('content1')
                    
               
            </div>
        </main>

    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    {{--
        
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.querySelector('.dropdown-toggle');
            dropdownToggle.addEventListener('click', function(e) {
                e.preventDefault();
                var dropdownMenu = dropdownToggle.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });
    
            document.addEventListener('click', function(e) {
                var target = e.target;
                if (!target.closest('.dropdown-toggle')) {
                    var dropdownMenus = document.querySelectorAll('.dropdown-menu');
                    dropdownMenus.forEach(function(dropdownMenu) {
                        dropdownMenu.classList.remove('show');
                    });
                }
            });
        });
    </script>--}}
   
     @yield('scripts')
</body>
</html>