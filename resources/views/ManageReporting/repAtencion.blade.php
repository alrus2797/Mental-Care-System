

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

<div id="printableArea">
     <div class="page-header">
          <h2>Reporte semanal de atención </h2>
        <p>Reportes semanales de pacientes atendidos al día por cada condición mental.</p>
      </div>
      <div class="col-md-10 col-md-offset-0 table-responsive">
   <table class="table table-hover table-bordered">
    <tr>
        <th>Paciente</th>
        <th>Medicamento</th>
        <th>Clinica</th>
        <th>Descripción</th>
        <th>autolesion</th>
    </tr>

      @foreach ($results as $row)
      <tr>
         <td>{{$row->paciente}}</td>
         <td>{{$row->medicina}}</td>
         <td>{{$row->clinica}}</td>
         <td>{{$row->descripcion}}</td>
         @if($row->autolesion=='no')
          <td><button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal{{$row->idp}}">{{$row->autolesion}} </button></td>
        @else
          <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$row->idp}}"> {{$row->autolesion}}</button></td>
        @endif
        <div class="modal fade" id="myModal{{$row->idp}}" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Descripsión de autolesiódel Paciente : {{$row->paciente}}</h4>
                </div>
                <div class="modal-body">
                  <p>{{$row->comentarios}}</p>
                </div>
              </div>

            </div>
          </div>
          </div>
      <tr>
      @endforeach
    </table>
  </table>
  <ul class="pagination">
    <li class="active"><a href="#">1</a></li>
  </ul>


</div >

<div class="col-sm-offset-0">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>



   @endsection
