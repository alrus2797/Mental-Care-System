

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

<div id="printableArea">
     <div class="page-header" id=topdfheader>
          <h2>Reporte semanal de atención </h2>
        <p>Reportes semanales de pacientes atendidos al día por cada condición mental.</p>
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
<div id="topdfbody">
        @if($results == NULL)
            <div><h4>No se encontraron resultados</h4></div>
        @else

        <h4>Resultados resultados encontrados entre <strong>{{$fecha1}} y {{$fecha2}}</strong></h4>
       <table class="table table-hover table-bordered">
        <tr>
            <th>Nombre del Paciente</th>
            <th>Fecha de la Cita</th>
            <th>Motivo de la Cita</th>
            <th>Estado</th>
        </tr>

          <hr>

          @foreach ($results as $row)
          <tr>

            <td>{{$row->nombrePaciente}}</td>
            <td>{{$row->fechacita}}</td>
            <td>{{$row->motivocita}}</td>
            <td>{{$row->estadocita}}</td>
          <tr>
          @endforeach
        </table>
  @endif

</div>
</div >

<div class="col-sm-offset-0">
	<a  onclick="cargar()" target="_blank">Ver en pdf</a>
</div>



   @endsection
