

@extends('layouts.template')
@section('title', 'Inicio')


   @section('content')

<div id="printableArea">
     <div class="page-header">
          <h2>DescargarReportes </h2>
      </div>
      <form class="form-inline">
        <div class="form-group">
          <label for="email">Nombre del reporte</label>
          <input type="email" class="form-control"  name="keyword">
        </div>
        <div class="form-group">
          <label for="email">Opciones</label>
          <select class="form-control" name="type">
            <option value="option 1">Option 1</option>
          </select>
        </div>
        <div class="form-group">
          <label for="moth">Mes</label>
          <input class="form-control" type="month" name="month">
        </div>
        <div class="form-group">
          <label for="week">Semana  </label>
          <input class="form-control"  type="week" name="week">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
    <hr>


      <div class="col-md-10 col-md-offset-0 table-responsive">


   <table class="table table-hover table-bordered">
    <tr>
        <th onclick="sortTable(0)">Nombre </th>
        <th onclick="sortTable(1)">Tipo de Reporte</th>
        <th >Fecha que se generó</th>
        <th>Descarga</th>

    </tr>
    @foreach ($results as $row)
        <tr>
          <td >{{$row->nombre}}</td>
          <td >{{$row->tipo}}</td>
          <td >{{$row->created_at}}</td>
          <td>
            <a href="{{asset('reportesPDF/'.$row->nombre.'.pdf')}}" target="_blank">Ver en pdf</a>

         <tr>
    @endforeach

    </table>
    <ul class="pagination">
      <li class="active"><a href="#">1</a></li>
    </ul>

</div >



   @endsection
