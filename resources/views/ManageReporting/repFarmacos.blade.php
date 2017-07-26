

@extends('layouts.app')
@section('title', 'Inicio')

   @section('content')



 <div class="page-header" id="topdfheader">
      <h2>Reporte de farmacos preescritos</h2>
    <p>Reportes semanales de número total de fármacos prescritos.</p>
  </div>

<div class="col-md-10 col-md-offset-0 table-responsive">
  <form class="form-inline">
    <div class="form-group">
      <label for="date">Selecciona la semana : </label>
      <input type="week" class="form-control" name="semana">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
  </form>
  <hr>
<div id="topdfbody" >
  @if($results == NULL)
      <div><h4>No se encontraron resultados</h4></div>
  @else

  <h4>Resultados resultados encontrados entre <strong>{{$fecha1}} y {{$fecha2}}</strong></h4>
  <hr>

   <table class="table table-hover table-bordered">
    <tr>
        <th>Medicamento</th>
        <th>Fecha de Preescripción</th>
        <th>Descripción </th>
        <th>Efectos secundarios</th>
        <th>Efectos adversos</th>
    </tr>
    @foreach ($results as $row)
      <tr>
        <td>{{$row->medicamento}}</td>
        <td>{{$row->fechaPres}}</td>
        <td>{{$row->medicamentoDesc}}</td>
        <td>{{$row->medicamentoEfecSec}}</td>
        <td>{{$row->medicamentoAdver}}</td>
      </tr>
    @endforeach
    </table>
    @endif

</div>


</div>
<a  onclick="cargar()" target="_blank">Ver en pdf</a>
    <script > 
      function cargar()
      {
        body  = document.getElementById('topdfbody').innerHTML;
        fecha ="<?php if(isset($_GET['semana'])) echo $_GET['semana']; else echo"";?>";
        window.open("exportarRep?titulo_doc=Reporte de farmacos preescritos&tipo=sem&fecha="+fecha+"&titulo=sem"+fecha+"&htmlex="+body,'_blank');
      }
    </script>
   @endsection
