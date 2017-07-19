@extends('layouts.app')
@section('title', 'Editar Paciente')

@section('content')

 <h2>Edición de paciente</h2>
<div id="PacienteEditar" class="row">



<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px" >
    <form method="POST" action="{{asset('pacientes/'.$get->id)}}">

        {{csrf_field()}}

        <input type="hidden" id="id" name="id" value="{{$getPersona->id}}">

        <input type="hidden" id="paciente_id" name="paciente_id" value="{{$get->id}}">

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$getPersona->apellidopaterno}}" >
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$getPersona->apellidomaterno}}">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$getPersona->nombres}}">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
          <div class="col-sm-3">
            <select class="form-control" id="sexo" name="sexo">
              <option value="M" @if ("M" == $getPersona->sexo) selected @endif>Masculino</option>
              <option value="F" @if ("F" == $getPersona->sexo) selected @endif>Femenino</option>
              <option value="O" @if ("O" == $getPersona->sexo) selected @endif>Otro</option>
            </select>
          </div>

        </div>



        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$getPersona->dni}}">
          </div>
          <div class="col-sm-2"></div>
            <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
          <div class="col-sm-3">
            <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento" value="{{$getPersona->fechanacimiento}}">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$getPersona->direccion}}" >
          </div>
          <div class="col-sm-2"></div>
            <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$getPersona->telefono}}">
          </div>
        </div>

        <div class="form-group col-sm-12">
            <label class="col-sm-2 col-form-label" for="email">Email:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="email" placeholder="Ingrese email" name="email" value="{{$getPersona->email}}" >
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="estado">Estado:</label>
          <div class="col-sm-3">
            <select class="form-control" id="estado" name="estado">

              @foreach ($estados as $estado)
              <option value="{{$estado->id}}" @if ($estado->id == $get->estado_id) selected @endif>{{$estado->nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="estado">Departamento:</label>
          <div class="col-sm-3">

            <select class="form-control" id="departamento" name="departamento">
            @foreach ($departamentos as $departamento)
            <option value="{{$departamento->id}}" @if ($departamento->id == $get->departamento_id) selected @endif>{{$departamento->name}}</option>
            @endforeach
          </select>
          </div>
          <div class="col-sm-2"> </div>
          <div class="col-sm-2"> </div>
          <div class="col-sm-3"> </div>
      </div>

      <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
          <div class="col-sm-3">
            <label class="form-control" id="registro" name="registro">{{$getPersona->created_at}}</label>
          </div>
          <div class="col-sm-2"> </div>
          <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
          <div class="col-sm-3">
               <label class="form-control" id="actualizacion" name="actualizacion">{{$getPersona->updated_at}}</label>
          </div>
      </div>


      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="{{asset('pacientes')}}">Cancelar</a>

  </form>

</div>
@endsection
