<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <!--Empieza Opciones Prescripciones-->
    @if(Request::is('citas*'))
    <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recetas <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
      <ul class="dropdown-menu forAnimate" role="menu">
        <li><a href="#">Crear</a></li>
        <li><a href="#">Modificar</a></li>
        <li><a href="#">Reportar</a></li>
        <li class="divider"></li>
        <li><a href="#">Informes</a></li>
      </ul>
    </li>          
    <li ><a href="{{url('citas/create')}}">Registro<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
    <li ><a href="#">Observaciones<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
    @else
    <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>   
    <li ><a href="#">Ayuda<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-question-sign"></span></a></li>   
    <li ><a href="#">Acerca de<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-exclamation-sign"></span></a></li>   
    @endif

  </ul>
</div>
