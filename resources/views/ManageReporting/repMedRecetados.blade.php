

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

   <div id="printableArea">

 <div class="page-header">
      <h2>Reporte de medicamentos recetados</h2>
    <p>Reportes de medicamentos recetados durante el mes.</p>
  </div>
<div class="col-md-10 col-md-offset-0 table-responsive">
   <table class="table table-hover table-bordered">
    <tr>
        <th>Paciente</th>
        <th>Medicamento</th>
        <th>Clinica</th>
        <th>Descripción</th>
    </tr>




    </table>
</div>
     </div>
 <div class="col-sm-offset-0 ">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>



   @endsection
