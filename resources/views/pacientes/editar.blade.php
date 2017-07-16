@extends('layouts.template')
@section('title', 'Editar Paciente')

@section('content')

 <h2>Edición de paciente</h2>

<div>
<form method="POST" action="{{asset('pacientes/'.$get->id)}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$getPersona->id}}">

<input type="hidden" id="paciente_id" name="paciente_id" value="{{$get->id}}">

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Historia Clinica:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="historiaclinica" placeholder="Ingrese historia clinica" name="historiaclinica" value="{{$get->historials_id}}" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$getPersona->apellidopaterno}}" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$getPersona->apellidomaterno}}" >
      </div>
     </div>


    </div>
        <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres"  value="{{$getPersona->nombres}}">
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$getPersona->dni}}" >
      </div>
    </div>

     <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion"  value="{{$getPersona->direccion}}">
      </div>
    </div>

    <div class="form-group">
     <label class="col-sm-2 col-form-label" for="email">Telefono:</label>
     <div class="col-sm-3">
           <input type="text" class="form-control" id="telefono" placeholder="Ingrese telefono" name="telefono"  value="{{$getPersona->telefono}}">
     </div>

     <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Email:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="email" placeholder="Ingrese email" name="email"  value="{{$getPersona->email}}">
      </div>



 <button type="submit" class="btn btn-primary">Guardar</button>


</form>
</div>
@endsection
