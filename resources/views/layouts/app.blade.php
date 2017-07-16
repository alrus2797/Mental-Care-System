<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Clinica') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!--link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css"-->
    {{ Html::style('css/font-awesome.css') }}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Clinica') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                            <li><a href="/"><i class="fa fa-home"></i> Inicio</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><i class="fa fa-vcard-o"></i> Ingresar</a></li>
                        @else
                            @if ( Auth::user()->tipo_usuario == 'Administrador' )
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fa fa-sitemap"></i> Sistema <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{route('usuarios.index')}}"><i class="fa fa-users"></i> Usuarios</a>
                                        </li>
                                        <li>
                                            <a href="{{route('departamento.index')}}"><i class="fa fa-cubes"></i> Departamentos</a>
                                        </li>
                                        <li>
                                            <a href="{{route('especialidad.index')}}"><i class="fa fa-star"></i> Especialidades</a>
                                        </li>
                                        <li>
                                            <a href="{{route('turnos.index')}}"><i class="fa fa-calendar-check-o"></i> Turnos</a>
                                        </li>
                                        <li>
                                            <a href="{{route('categoriaSintoma.index')}}"><i class="fa fa-list"></i> Categorias Sintoma</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fa fa-folder"></i> Servicio medico<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{route('sintoma.index')}}"><i class="fa fa-eye"></i> Sintomas</a>
                                        </li>
                                        <li>
                                            <a href="{{route('enfermedad.index')}}"><i class="fa fa-crosshairs"></i> Enfermedades</a>
                                        </li>
                                        <li>
                                            <a href="{{route('paciente.index')}}"><i class="fa fa-address-book"></i> Pacientes</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fa fa-folder"></i> Servicio medico<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{route('sintoma.index')}}"><i class="fa fa-eye"></i> Sintomas</a>
                                        </li>
                                        <li>
                                            <a href="{{route('enfermedad.index')}}"><i class="fa fa-crosshairs"></i> Enfermedades</a>
                                        </li>
                                        <li>
                                            <a href="{{route('paciente.index')}}"><i class="fa fa-address-book"></i> Pacientes</a>
                                        </li>
                                        <li>
                                            <a href="{{route('diagnostico.pendientes')}}"><i class="fa fa-user-md"></i> Diagnosticos Pendientes</a>
                                        </li>
                                        <li>
                                            <a href="{{route('diagnostico.index')}}"><i class="fa fa-medkit"></i> Diagnosticos Realizados</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
