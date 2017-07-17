<!DOCTYPE html>
<html lang="es">
<head>
  <title>MC - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="{{asset('css/template.css')}}" rel="stylesheet" type="text/css"></link>

  <script src="{{asset('js/alertify.min.js')}} " >  </script>
  <link href="{{asset('css/alertify.min.css')}}" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Latest compiled and minified JavaScript -->

  <script src="{{asset( 'js/bootstrap.min.js')}}"></script>
  <link href="{{asset('css/template.css')}}" rel="stylesheet" type="text/css"></link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>
   <script type="text/javascript">
function printDiv(divName)
{
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
    </script>




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
        <li ><a href="{{url('estadistica')}}">Estadística</a></li>
        <!--<li ><a href="#">Admisión</a></li> -->
        <li ><a href="#">Citas</a></li>
        <li ><a href="#">Historial</a></li>
        <li ><a href="{{url('reportes/')}}">Manejo de Reportes</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>




<div class="row">
    <div class="col-lg-3">
<!--
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

    @yield('sidebar')
  'OR'1'='1'
  </div>
</nav>-->

    </div>

    <div class="col-xs-12">
      <div class="container margintop-70" id="cont">
          @yield('content')

      </div>
    </div>
</div>

<!--
<footer class="container-fluid text-center">
  <p>CSUNSA - 2017</p>
</footer>
-->
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});


</script>



</body>

</html>
