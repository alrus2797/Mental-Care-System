

@extends('layouts.template')
@section('title', 'Inicio')


   @section('content')

   <div id="printableArea">
 <div class="page-header">
      <h2>Reporte de pacientes atendidos por Clinica </h2>
    <p>Reportes mensuales de pacientes atendidos por clínica.</p>
  </div>

<div class="col-md-10 col-md-offset-0 table-responsive">
   <table class="table table-hover table-bordered">
   <tr>
        <th>Paciente</th>
        <th>Medico</th>
        <th>Receta</th>
        <th>Fecha</th>
        <th>Au*</th>
        <th>Clinica</th>
        <th>Comentarios</th>
	</tr>

  <ul class="pagination">
    <li class="active"><a href="#">1</a></li>
  </ul>


    </table>
</div>

</div>
<div class="col-sm-offset-0 ">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>

   @endsection
