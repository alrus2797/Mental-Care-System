

@extends('layouts.app')
@section('title', 'Inicio')



   @section('content')

   <div id="printableArea">

 <div class="page-header">
      <h2>Información de tratamiento</h2>
      <h4>{{$inforeporte}}</h4>
  </div>
<div>
  <h2>{{$results_datos[0]->apellidopaterno}} {{$results_datos[0]->apellidomaterno}} ,  {{$results_datos[0]->nombres}} </h2>
  <h4><strong>Dirección :</strong> {{$results_datos[0]->direccion}}   <strong> DNI: </strong>{{$results_datos[0]->dni}}</h4>
  <h4><strong>Telefono :</strong>{{$results_datos[0]->telefono}}</h4>
  <hr>
  <h3>Datos de prescripción</h3>
    @if($results_pres_med == NULL )
        <div><h4>No se encontraron resultados en esta tabla</h4></div>
    @else
   <table class="table table-hover table-bordered">
    <tr>
        <th>Fecha de la Preescripción </th>
        <th>Observación </th>
        <th>Medicamentos recetados</th>
        <th>Cantidad</th>
    </tr>
      @foreach ($results_pres_med as $row)
      <tr>
        <td>{{$row->fechaPres}}</td>
        <td>{{$row->obspres}}</td>
        <td>{{$row->nombre_med}}</td>
        <td>{{$row->cantmed}}</td>
      <tr>
      @endforeach
    </table>
  @endif

  <hr>
  <h3>Datos de las citas del paciente</h3>

  @if($results_citas_pac == NULL)
      <div><h4>No se encontraron resultados</h4></div>
  @else
  <table class="table table-hover table-bordered">
  <tr>
      <th>Fecha de Cita </th>
      <th>Motivo de la cita </th>
      <th>Estado de la cita</th>
  </tr>

    @foreach ($results_citas_pac as $row_pac)
    <tr>
      <td>{{$row_pac->fechacita}}</td>
      <td>{{$row_pac->motivocita}}</td>
      <td>{{$row_pac->estadocita}}</td>
    <tr>
    @endforeach
  </table>
  @endif
</div>

  <div class="col-md-10 col-md-offset-0 table-responsive">
<a href="{{asset($ruta)}}" target="_blank">Ver en pdf</a>

  <hr>

  </div>
</div>




   @endsection
