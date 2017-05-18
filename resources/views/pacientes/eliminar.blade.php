@extends('layout')

@section('content')

<form method="POST" action="{{asset('pacientes/eliminar')}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$get->id}}">

<label for="nombre"> Historia Clinica: </label>
<input type="text" id="historiaclinica" name="historiaclinica" value="{{$get->historiaclinica}}" readonly>

<label for="nombre"> Apellido Paterno: </label>
<input type="text" id="apellidopaterno" name="apellidopaterno" value="{{$get->apellidopaterno}}" readonly>

<label for="nombre"> Apellido Materno: </label>
<input type="text" id="apellidomaterno" name="apellidomaterno" value="{{$get->apellidomaterno}}" readonly>

<label for="nombre"> Nombre: </label>
<input type="text" id="nombres" name="nombres" value="{{$get->nombres}}" readonly>

<label for="nombre"> DNI: </label>
<input type="text" id="dni" name="dni" value="{{$get->dni}}" readonly>

<label for="nombre"> Direccion: </label>
<input type="text" id="direccion" name="direccion" value="{{$get->direccion}}" readonly>

<button type="submit"> Eliminar </button>
<a href="{{asset('pacientes/')}}">Cancelar</a>

</form>

@endsection
