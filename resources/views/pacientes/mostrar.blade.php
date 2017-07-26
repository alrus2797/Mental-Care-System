

@extends('layouts.app')
@section('title', 'Ver Paciente')

@section('content')


<h2>Ver Paciente</h2> <br><br>



<div >

  <div class="form-group col-sm-12">
    <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$persona->apellidopaterno}}"  readonly>
    </div>
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$persona->apellidomaterno}}" readonly>
    </div>
  </div>

  <div class="form-group col-sm-12">
    <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$persona->nombres}}" readonly>
    </div>
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
    <div class="col-sm-3">
      @if ("M" == $persona->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Masculino" readonly> @endif
      @if ("F" == $persona->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Femenino" readonly> @endif
      @if ("O" == $persona->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Otro" readonly> @endif
    </div>

  </div>



  <div class="form-group col-sm-12">
    <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$persona->dni}}" readonly>
    </div>
    <div class="col-sm-2"></div>
      <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
    <div class="col-sm-3">
      <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento" value="{{$persona->fechanacimiento}}" readonly>
    </div>
  </div>

  <div class="form-group col-sm-12">
    <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$persona->direccion}}" readonly >
    </div>
    <div class="col-sm-2"></div>
      <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$persona->telefono}}" readonly>
    </div>
  </div>

  <div class="form-group col-sm-12" >
      <label class="col-sm-2 col-form-label" for="email">Email:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$persona->email}}" readonly >
    </div>
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label" for="estado">Estado:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="estado" placeholder="Ingrese estado" name="estado"  value="{{$estado->nombre}}" readonly>

    </div>
  </div>
  <div class="form-group col-sm-12" >
    <label class="col-sm-2 col-form-label" for="estado">Departamento:</label>
    <div class="col-sm-3">

      <input type="text" class="form-control" id="departamento" placeholder="Ingrese departamento" name="departamento"  value="{{$departamento->name}}" readonly>

    </div>
    <div class="col-sm-2"> </div>
    <label class="col-sm-2 col-form-label" for="aler">Alergias:
      <br>
      <br>
      <form action="{{asset('pacientes/alergias')}}/{{$paciente->id}}" >
          <input class="btn btn-primary" type="submit" value="Todas las Alergias">
      </form>
    </label>


    <div class="col-sm-3" style="overflow-y:auto;max-height:100px;">
    <table class="table table-responsive" class="form-group" id="aler">

      <tbody>
        @foreach($alergias as $a)
        <tr>
          <td>{{$a->nombre}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
   </div>
  </div>



    <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
          <div class="col-sm-3">
            <label class="form-control" id="registro" name="registro">{{$persona->created_at}}</label>
          </div>
          <div class="col-sm-2"> </div>
          <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
          <div class="col-sm-3">
               <label class="form-control" id="actualizacion" name="actualizacion">{{$persona->updated_at}}</label>
          </div>
      </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
      <form action="{{asset('pacientes')}}">
          <input class="btn btn-primary" type="submit" value="Todos los Pacientes">
      </form>
      </div>
      <div class="col-sm-3">
        <form action="{{asset('pacientes')}}{{'/'.$paciente->id.'/editar'}}">
            <input class="btn btn-primary" type="submit" value="Editar Paciente">
        </form>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text"></i> Historial medico
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Medico</th>
                        <th width="10%">Fecha y Hora</th>
                        <th width="20%">Sintomas</th>
                        <th width="15%">Diagnostico</th>
                        <th>Recomendaciones</th>
                        <th>Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $num = 1; ?>
                    @foreach($paciente->diagnosticos as $diagnostico)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$diagnostico->user->name}}<br/>{{$diagnostico->user->especialidad->nombre}}</td>
                            <td>{{$diagnostico->fecha_creacion()}}<br/>{{$diagnostico->hora_creacion()}}</td>
                            <td>
                                <?php $aux = 0; ?>
                                @foreach($diagnostico->sintomas as $sintoma_lista)
                                    {{ $sintoma_lista->nombre }}
                                    <?php $aux++; ?>
                                    @if($aux<$diagnostico->sintomas->count()) , @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($diagnostico->enfermedades as $enfermedad_lista)
                                    - {{ $enfermedad_lista->nombre }}<br/>
                                @endforeach
                            </td>
                            <td>
                                <p>{{ $diagnostico->recomendacion }}</p>
                            </td>
                            <td>
                                <a href="{{route('diagnostico.show',$diagnostico->id)}}" class="btn btn-success"><i class="fa fa-file-text"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
