<!DOCTYPE html>
<html lang="es">
<head>
  <title>MC - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset( 'js/bootstrap.min.js ')}}"></script>
  <link href="{{asset('css/template.css')}}" rel="stylesheet" type="text/css"></link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
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
        <li ><a href="#">Prescripción</a></li>
        <li ><a href="#">Estadística</a></li>
        <li ><a href="#">Admisión</a></li>
        <li ><a href="#">Citas</a></li>
        <li ><a href="#">Historial</a></li>
        <li ><a href="/reportes">Manejo de Reportes</a></li>
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
    @yield('sidebar')
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
