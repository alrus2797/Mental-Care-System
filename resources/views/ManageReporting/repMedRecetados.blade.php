

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

   <div id="printableArea">

 <div class="page-header">
      <h2>Reporte de medicamentos recetados</h2>
    <p>Reportes de medicamentos recetados durante el mes.</p>
  </div>


<div class="col-md-10 col-md-offset-0 table-responsive">

  <form class="form-inline">
    <div class="form-group">
      <label for="date">Selecciona el mes : </label>
      <input type="month" class="form-control" name="mes">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
  </form>

  <hr>

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
 <div class="col-sm-offset-0 ">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>



   @endsection
