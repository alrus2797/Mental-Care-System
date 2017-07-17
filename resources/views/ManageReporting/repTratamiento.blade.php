

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')


     <div id="printableArea">
     	<div class="page-header">
        <h2>Reporte de información de tratamiento</h2>
      <p>Reportes que contengan información del tratamiento prescrito del paciente.</p>
    </div>

    <form class="form-inline" method="get" action="">

      <div class="form-group">
        <label for="text">DNI :</label>
        <input type="text" class="form-control"  placeholder="DNI del Paciente" name="dni">
      </div>

        <div class="form-group">
          <label for="text">Nombre :</label>
          <input type="text" class="form-control"  placeholder="Nombre del Paciente" name="nombre">
        </div>

      <button type="submit" class="btn btn-default">Buscar</button>
    </form>
    <hr>

  	<div class="col-md-10 col-md-offset-0 table-responsive">

    @if($results == NULL)
        <div><h4>No se encontraron resultados</h4></div>
    @else
    <table class="table table-hover table-bordered" id="tableToSort">
    <tr>
        <th>Paciente</th>
        <th>Fecha Admision</th>
        <th>Ver</th>
    </tr>

    @foreach ($results as $row)
      <tr>
        <td>{{$row->ap_paterno}} {{$row->ap_materno}} , {{$row->nombre}} </td>
        <td>{{$row->fecha_admision}}</td>
        <td><a href="">Ver</a></td>
      </tr>
    @endforeach
    </table>
    @endif

      <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
      </ul>
  </div>
     </div>






   @endsection
