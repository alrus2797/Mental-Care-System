@extends('layouts.template')
@section('title', 'Eliminar Paciente')
@section('content')

 <h2>Eliminar Paciente</h2>

<div>
<form method="POST" action="{{asset('pacientes/eliminar')}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$get->id}}">

<input type="hidden" id="persona_id" name="persona_id" value="{{$getPersona->id}}">

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Historia Clinica:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="historia" placeholder="Ingrese historia clinica" name="historia" value="{{$get->historials_id}}" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$getPersona->apellidopaterno}}" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$getPersona->apellidomaterno}}" readonly>
  </div>
 </div>


<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres"  value="{{$getPersona->nombres}}" readonly>
  </div>
</div>


<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">DNI:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$getPersona->dni}}" readonly>
  </div>
</div>

 <div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion"  value="{{$getPersona->direccion}}" readonly>
  </div>

  <div class="form-group">
   <label class="col-sm-2 col-form-label" for="email">Telefono:</label>
   <div class="col-sm-3">
         <input type="text" class="form-control" id="telefono" placeholder="Ingrese telefono" name="telefono"  value="{{$getPersona->telefono}}" readonly>
   </div>

   <div class="form-group">
    <label class="col-sm-2 col-form-label" for="email">Email:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese email" name="email"  value="{{$getPersona->email}}" readonly>
    </div>

    <div class="form-group">
     <label class="col-sm-2 col-form-label" for="estado">Estado:</label>
     <div class="col-sm-3">
       <input type="text" class="form-control" id="estado" placeholder="Ingrese estado" name="estado"  value="{{$estado->nombre}}" readonly>
     </div>
    </div>

<button type="submit" class="btn btn-primary"> Eliminar </button>
<a href="{{asset('pacientes')}}">Cancelar</a>

</form>
</div>
@endsection
