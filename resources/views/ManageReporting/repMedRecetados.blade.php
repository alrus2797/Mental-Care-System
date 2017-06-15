

@extends('layouts.template')
@section('title', 'Inicio')


   
   @section('content')      
 <div class="page-header">
      <h2>Reporte de medicamentos recetados</h2>      
    <p>Reportes de medicamentos recetados durante el mes.</p>
  </div>

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

   @endsection