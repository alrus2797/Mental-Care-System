

@extends('layouts.template')
@section('title', 'Inicio')


   
   @section('content')      


<div class="container">
    
  <div class="page-header">
      <h2>Reportes</h2>      
    <p>Seleccione el tipo de reportes que desea generar</p>
  </div>

        

<center>
    <div class="col-md-7 col-md-offset-2">
    <a href="/reportes/repTratamiento" class="list-group-item ">
      <h4 class="list-group-item-heading">Reporte de información de tratamiento</h4>
      <p class="list-group-item-text">Reportes que contengan información del tratamiento prescrito del paciente.</p>
    </a>
    <a href="/reportes/repAtencion" class="list-group-item">
      <h4 class="list-group-item-heading">Reporte de atención </h4>
        <p class="list-group-item-text">Reportes <strong>semanales</strong> de pacientes atendidos <strong>al día</strong> por cada condición mental.</p>
    </a>
    <a href="/reportes/repFarmacos" class="list-group-item">
      <h4 class="list-group-item-heading">Reporte de farmacos preescritos</h4>
      <p class="list-group-item-text">Reportes <strong>semanales</strong> de número total de fármacos prescritos. </p>
    </a>
    <a href="/reportes/repAtendidos" class="list-group-item">
      <h4 class="list-group-item-heading">Reporte de pacientes atendidos (*)</h4>
        <p class="list-group-item-text">Reportes <strong>mensual</strong>es de pacientes atendidos por clínica. </p>
    </a>
    <a href="/reportes/repMedRecetados" class="list-group-item">
      <h4 class="list-group-item-heading">Reporte de medicamentos recetados (*)</h4>
      <p class="list-group-item-text">Reportes de medicamentos recetados durante el mes. </p>
    </a>
  </div>
    </center>
  
</div>

   @endsection