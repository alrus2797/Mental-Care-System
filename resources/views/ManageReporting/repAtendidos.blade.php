

@extends('layouts.template')
@section('title', 'Inicio')

   
   @section('content')    

   <div id="printableArea">  
 <div class="page-header">
      <h2>Reporte de pacientes atendidos por Clinica</h2>      
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
        <?php
            $sqlQuery = "select paciente.nombre as paciente, medico.nombre as medico , medicina.nombre as medicina, atencionmedica.fecha, atencionmedica.autolesion , clinica.nombre as clinica, atencionmedica.comentarios from atencionmedica inner JOIN paciente on atencionmedica.paciente = paciente.id inner JOIN medico on atencionmedica.medico = medico.id inner JOIN medicina on atencionmedica.medicamento =medicina.id inner JOIN clinica on atencionmedica.clinica = clinica.id";

            $result = DB::select(DB::raw($sqlQuery));                   
            foreach ($result as $row)
            {
                echo "<tr>";
                echo "<td>".$row->paciente."</td>";
                echo "<td>".$row->medico."</td>";
                echo "<td>".$row->medicina."</td>";
                echo "<td>".$row->fecha."</td>";
                echo "<td>".$row->autolesion."</td>";
                echo "<td>".$row->clinica."</td>";
                echo "<td>".$row->comentarios."</td>";
                echo "</tr>";
            }
        ?>
    </table> 
</div>
     
</div>
<div class="col-sm-offset-0 ">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>

   @endsection