<!DOCTYPE html>
<html lang="es">
<head>
  <title>MC - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{asset('css/template.css')}}" rel="stylesheet" type="text/css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{asset('js/alertify.min.js')}} " >  </script>
  <link href="{{asset('css/alertify.min.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Mental Care</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/')}}">Home</a></li>

        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personas <span class="caret"></span></a>
         <ul class="dropdown-menu">
            <li><a href="{{ url('personas/crear')}}">Nueva Persona</a></li>
            <li><a href="{{ url('personas/buscar')}}">Buscar Persona</a></li>
            <li><a href="{{ url('personas/')}}">Todas las Personas</a></li>
         </ul>
       </li>

       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pacientes <span class="caret"></span></a>
        <ul class="dropdown-menu">

           <li><a href="{{ url('pacientes/crear')}}">Nuevo Paciente</a></li>
           <li><a href="{{ url('pacientes/buscar')}}">Buscar Paciente</a></li>
           <li><a href="{{ url('pacientes/')}}">Todos los Pacientes</a></li>
           <li class="divider"></li>
           <li><a href="{{ url('pacientes/estados/crear')}}">Nuevo Estado de Paciente</a></li>
           <li><a href="{{ url('pacientes/estados/todos')}}">Todos los Estados de Pacientes</a></li>

        </ul>
      </li>

        <li ><a href="{{url('prescripcion/')}}">Prescripción</a></li>
        <li ><a href="{{url('medicamentos')}}">Medicamentos</a></li>
        <li ><a href="#">Estadística</a></li>
        <!--<li ><a href="#">Admisión</a></li> -->
        <li ><a href="#">Citas</a></li>
        <li ><a href="#">Historial</a></li>
        <li ><a href="#">Manejo de Reportes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

  <br>
  <br>
  @yield('content')
<br>
<br>
</div>
<div class="container">

<footer class="container-fluid text-center ">
  <p>CSUNSA - 2017</p>
</footer>
</div>
<!--
-->
</body>
</html>
