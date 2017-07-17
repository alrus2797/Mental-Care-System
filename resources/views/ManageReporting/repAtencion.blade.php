

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

<div id="printableArea">
     <div class="page-header">
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

            <!--<div class="modal fade" id="myModal{{$row->idp}}" role="dialog">
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
            </div>-->
          <tr>
          @endforeach
        </table>
  @endif


</div >

<div class="col-sm-offset-0">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>



   @endsection
