

@extends('layouts.template')
@section('title', 'Inicio')


   @section('content')

   <div id="printableArea">
 <div class="page-header">
      <h2>Reporte de pacientes atendidos por Clinica </h2>
    <p>Reportes mensuales de pacientes atendidos por clínica.</p>
  </div>

  <form class="form-inline">
    <div class="form-group">
      <label for="date">Selecciona el mes : </label>
      <input type="month" class="form-control" name="mes">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
  </form>

<div class="col-md-10 col-md-offset-0 table-responsive">

  @if($results == NULL)
      <div><h4>No se encontraron resultados</h4></div>
  @else

  <h4>Resultados resultados encontrados entre <strong>{{$fecha1}} y {{$fecha2}}</strong></h4>
  <hr>

   <table class="table table-hover table-bordered">
    <tr>
        <th>Medico</th>
        <th>Paciente</th>
        <th>Fecha de la cita </th>
        <th>Observación</th>
    </tr>
    @foreach ($results as $row)
      <tr>
        <td>{{$row->nombre_med}}</td>
        <td>{{$row->nombre_pac}}</td>
        <td>{{$row->fecha}}</td>
        <td>{{$row->obsmed}}</td>
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
