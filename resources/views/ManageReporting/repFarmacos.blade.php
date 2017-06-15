

@extends('layouts.template')
@section('title', 'Inicio')


   
   @section('content')      
 <div class="page-header">
      <h2>Reporte de farmacos preescritos</h2>      
    <p>Reportes semanales de número total de fármacos prescritos.</p>
  </div>

<div class="col-md-10 col-md-offset-0 table-responsive">
   <table class="table table-hover">
    <tr>
        <th>Paciente</th>
        <th>Medicamento</th>
        <th>Clinica</th>
        <th>Descripción</th>
    </tr>
        <?php
            $sqlQuery = "select paciente.nombre as paciente, medicina.nombre as medicina, clinica.nombre as clinica , medicina.descripcion
                    from atencionmedica 
                        join paciente
                            on atencionmedica.paciente = paciente.id
                        join medicina
                            on atencionmedica.medicamento = medicina.id
                        join clinica
                            on atencionmedica.clinica = clinica.id";

            $result = DB::select(DB::raw($sqlQuery));                   
            foreach ($result as $row)
            {
                echo "<tr>";
                echo "<td>".$row->paciente."</td>";
                echo "<td>".$row->medicina."</td>";
                echo "<td>".$row->clinica."</td>";
                echo "<td>".$row->descripcion."</td>";

                echo "</tr>";
            }
        ?>
    </table> 
</div>
     
  


   @endsection