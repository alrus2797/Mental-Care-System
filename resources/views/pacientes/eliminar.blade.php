@extends('layouts.prescriptionsTemplate')
@section('title', 'Eliminar Paciente')
@section('content')

 <h2>Eliminar Paciente</h2>

<div>
<form method="POST" action="{{asset('pacientes/eliminar')}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$get->id}}">

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Historia Clinica:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="historiaclinica" placeholder="Ingrese historia clinica" name="historiaclinica" value="{{$get->historiaclinica}}" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$get->apellidopaterno}}" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$get->apellidomaterno}}" readonly>
      </div>
     </div>


    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres"  value="{{$get->nombres}}" readonly>
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$get->dni}}" readonly>
      </div>
    </div>

     <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion"  value="{{$get->direccion}}" readonly>
      </div>
    </div>


<button type="submit" class="btn btn-primary"> Eliminar </button>
<a href="{{asset('pacientes/')}}">Cancelar</a>

</form>
</div>
@endsection
