@extends('layouts.prescriptionsTemplate')
@section('title', 'Editar Paciente')

@section('content')

<form method="POST" action="{{asset('pacientes/'.$get->id)}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$get->id}}">

<label for="nombre"> Historia Clinica: </label>
<input type="text" id="historiaclinica" name="historiaclinica" value="{{$get->historiaclinica}}">

<label for="nombre"> Apellido Paterno: </label>
<input type="text" id="apellidopaterno" name="apellidopaterno" value="{{$get->apellidopaterno}}">

<label for="nombre"> Apellido Materno: </label>
<input type="text" id="apellidomaterno" name="apellidomaterno" value="{{$get->apellidomaterno}}">

<label for="nombre"> Nombre: </label>
<input type="text" id="nombres" name="nombres" value="{{$get->nombres}}">

<label for="nombre"> DNI: </label>
<input type="text" id="dni" name="dni" value="{{$get->dni}}">

<label for="nombre"> Direccion: </label>
<input type="text" id="direccion" name="direccion" value="{{$get->direccion}}">

<button type="submit"> Guardar </button>


</form>

@endsection
