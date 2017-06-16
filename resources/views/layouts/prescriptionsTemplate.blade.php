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
        <li ><a href="{{url('pacientes/')}}">Pacientes</a></li>
        <li ><a href="{{url('prescripcion/')}}">Prescripción</a></li>
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






<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
      @include('layouts.sidebar')
  </div>
</nav>



<div class="container-fluid text-center">


  @yield('content')

</div>

<footer class="container-fluid text-center">
  <p>CSUNSA - 2017</p>
</footer>

</body>
</html>
