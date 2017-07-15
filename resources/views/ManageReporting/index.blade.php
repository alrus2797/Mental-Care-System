

@extends('layouts.template')
@section('title', 'Inicio')

<link rel="stylesheet" href="{{ asset('css/menuReporting.css')}}">

   @section('content')


<div class="container">

  <div class="page-header">
      <h2>Reportes</h2>
  </div>




<!--
<div>
  <a href=""><div class="buttonpdf"></div></a>
  <a href=""><div class="buttonpacientes"></div></a>
  <a href=""><div class="buttonmedicamentos"></div></a>
  <a href=""><div class="buttonie"></div></a>
</div>

-->




<center>

    <div class="col-md-7 col-md-offset-2">
      <h4 class="text-info">Reporte Generales</h4>
      <hr>
      <a href="/reportes/repTratamiento" class="list-group-item ">
        <h4 class="list-group-item-heading">Reporte de información de tratamiento</h4>
        <p class="list-group-item-text">Reportes que contengan información del tratamiento prescrito del paciente.</p>
      </a>

      <h4 class="text-info">Reporte Semanales</h4>
      <hr>
      <a href="/reportes/repAtencion" class="list-group-item">
        <h4 class="list-group-item-heading">Reporte de atención </h4>
          <p class="list-group-item-text">Reportes <strong>semanales</strong> de pacientes atendidos <strong>al día</strong> por cada condición mental.</p>
      </a>
      <a href="/reportes/repFarmacos" class="list-group-item">
        <h4 class="list-group-item-heading">Reporte de farmacos preescritos</h4>
        <p class="list-group-item-text">Reportes <strong>semanales</strong> de número total de fármacos prescritos. </p>
      </a>

      <h4 class="text-info">Reportes Mensuales</h4>
      <hr>
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
