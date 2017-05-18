@extends('layout')

@section('content')

<form method="POST" action="{{asset('pacientes/crear')}}">

{{csrf_field()}}

<label for="nombre"> Historia Clinica: </label>
<input type="text" id="historiaclinica" name="historiaclinica">

<label for="nombre"> Apellido Paterno: </label>
<input type="text" id="apellidopaterno" name="apellidopaterno">

<label for="nombre"> Apellido Materno: </label>
<input type="text" id="apellidomaterno" name="apellidomaterno">

<label for="nombre"> Nombre: </label>
<input type="text" id="nombres" name="nombres">

<label for="nombre"> DNI: </label>
<input type="text" id="dni" name="dni">

<label for="nombre"> Direccion: </label>
<input type="text" id="direccion" name="direccion">

<button type="submit"> Guardar </button>


</form>

@endsection
