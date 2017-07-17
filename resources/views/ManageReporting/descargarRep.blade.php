

@extends('layouts.template')
@section('title', 'Inicio')


   @section('content')

<div id="printableArea">
     <div class="page-header">
          <h2>DescargarReportes </h2>
      </div>



      <div class="col-md-15 col-md-offset-0 table-responsive">


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
            <a href="{{asset('reportesPDF/'.$row->nombre.'.pdf')}}" target="_blank">PDF</a>

         <tr>
    @endforeach

    </table>


</div >



   @endsection
