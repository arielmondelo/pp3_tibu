<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Base Transporte') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    BaseTransporte
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                            @if (Route::has('Login'))
                            @endif

                            @if (Route::has('register'))
                            @endif
                        @else
                            @if (Auth::user()->rol == 3)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('mostrar-solicitudes-usuario') }}">Mis
                                        solicitudes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('crear-solicitud') }}">Crear solicitud</a>
                                </li>
                            @endif
                            @if (Auth::user()->rol == 2)
                                @if (Route::currentRouteName() == 'index' || Route::currentRouteName() == 'crear-vehiculo')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('mostrar-vehiculos') }}">Vehiculos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('imprimir-solicitud-aprobada') }}">Solicitudes
                                            aprobadas</a>
                                    </li>
                                @elseif (Route::currentRouteName() == 'mostrar-vehiculos')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('crear-vehiculo') }}">Agregar vehículo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('imprimir-solicitud-aprobada') }}">Solicitudes
                                            aprobadas</a>
                                    </li>
                                @elseif (Route::currentRouteName() == 'imprimir-solicitud-aprobada')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('mostrar-vehiculos') }}">Vehiculos</a>
                                    </li>
                                @endif
                            @endif
                            @if (Auth::user()->rol == 1)
                                @if (Route::currentRouteName() == 'editar-usuarios')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('solicitudes-eliminadas') }}">Solicitudes
                                            eliminadas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trazas-usuarios') }}">Trazas usuarios</a>
                                    </li>
                                @elseif (Route::currentRouteName() == 'index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('editar-usuarios') }}">Editar usuarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('solicitudes-eliminadas') }}">Solicitudes
                                            eliminadas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trazas-usuarios') }}">Trazas usuarios</a>
                                    </li>
                                @elseif (Route::currentRouteName() == 'trazas-usuarios')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('editar-usuarios') }}">Editar usuarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('solicitudes-eliminadas') }}">Solicitudes
                                            eliminadas</a>
                                    </li>
                                @elseif(Route::currentRouteName() == 'solicitudes-eliminadas')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('editar-usuarios') }}">Editar usuarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trazas-usuarios') }}">Trazas usuarios</a>
                                    </li>
                                @endif
                            @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('Login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('Login') }}">{{ __('Autenticarse') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
            @yield('content')
        </main>
    </div>
</body>

</html>
