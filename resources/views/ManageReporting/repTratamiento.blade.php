

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

   <div id="printableArea">
   	<div class="page-header">
      <h2>Reporte de información de tratamiento</h2>
    <p>Reportes que contengan información del tratamiento prescrito del paciente.</p>
  </div>

	<div class="col-md-10 col-md-offset-0 table-responsive">
   <table class="table table-hover table-bordered" id="tableToSort">
    <tr>
        <th onclick="sortTable(0)">Paciente</th>
        <th onclick="sortTable(1)">Medicamento</th>
        <th onclick="sortTable(2)">Clinica</th>
        <th>Descripción</th>
    </tr>
    </table>
    <ul class="pagination">
      <li><a href="#">1</a></li>
      <li class="active"><a href="#">2</a></li>
    </ul>
</div>
   </div>


<div class="col-sm-offset-0 ">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>


   @endsection
