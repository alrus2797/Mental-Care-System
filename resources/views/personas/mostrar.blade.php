

@extends('layouts.template')
@section('title', 'Ver Persona')

@section('content')


<h2>Ver Persona</h2> <br><br>



<div>


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

<div class="form-group">
 <label class="col-sm-2 col-form-label" for="email">Telefono:</label>
 <div class="col-sm-3">
       <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$tabla->telefono}}" readonly>
 </div>
</div>

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Email:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$tabla->email}}" readonly>
  </div>
</div>



</div>




@endsection
