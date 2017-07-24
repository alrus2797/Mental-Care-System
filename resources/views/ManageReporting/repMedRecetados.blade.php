

@extends('layouts.app')
@section('title', 'Inicio')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


   @section('content')

   <div id="printableArea">

  <div class="page-header" id="topdfheader">
      <h2>Reporte de medicamentos recetados</h2>
    <p>Reportes de medicamentos recetados durante el mes.</p>
  </div>


<div class="col-md-10 col-md-offset-0 table-responsive" >

  <form class="form-inline">
    <div class="form-group">
      <label for="date">Selecciona el mes : </label>
      <input type="month" class="form-control" name="mes">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
  </form>

  <hr>
    <div id="topdfbody">
      @if($results == NULL)
          <div><h4>No se encontraron resultados</h4></div>
      @else
      <table class="table table-hover table-bordered">
      <tr>
          <th>Nombre del medicamento</th>
          <th>Fecha de Preescripción</th>
          <th>Descripción</th>
          <th>Efectos Secundarios</th>
          <th>Efectos Adversos</th>
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
     </div>
<a  onclick="cargar()" target="_blank">Ver en pdf</a>
<script > 
  function cargar()
  {
    title="Reporte de medicamentos recetados";
    body  = document.getElementById('topdfbody').innerHTML;
    fecha ="<?php if(isset($_GET['mes']))echo $_GET['mes'];?>";
    window.open("exportarRep?titulo_doc=Reporte de medicamentos recetados&tipo=mes&fecha="+fecha+"&titulo=mens"+fecha+"&htmlex="+body,'_blank');
  }
</script>
@endsection
