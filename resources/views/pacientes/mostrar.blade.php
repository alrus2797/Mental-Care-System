

@extends('layouts.prescriptionsTemplate')
@section('title', 'Ver Paciente')

@section('content')


<h2>Ver Paciente</h2> <br><br>



<div>

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Historia Clinica:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="historiaclinica" placeholder="Ingrese historia clinica" name="historiaclinica" value="{{$tabla->historiaclinica}}" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$tabla->apellidopaterno}}" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$tabla->apellidomaterno}}" readonly>
  </div>
 </div>


<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres"  value="{{$tabla->nombres}}" readonly>
  </div>
</div>


<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">DNI:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$tabla->dni}}" readonly>
  </div>
</div>

 <div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion"  value="{{$tabla->direccion}}" readonly>
  </div>
</div>

</div>

@endsection
