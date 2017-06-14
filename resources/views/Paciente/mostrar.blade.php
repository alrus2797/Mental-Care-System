@extends('layouts.template')

@section('content')
      @if($paciente)

<style>
  .titles{
    text-transform: capitalize;
    font-weight: bold;
  }
</style>
  <div class="container" style="width:70%;">
      <h2>PACIENTE N° {{$paciente->id}}</h2>
      <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td class="titles">Nombres:</td>
              <td>{{$paciente->nombres}}</td>
            </tr>
            <tr>
              <td class="titles">Apellido Paterno :</td>
              <td>{{$paciente->apellidoPaterno}}</td>
            </tr>
            <tr>
              <td class="titles">Apellido Materno :</td>
              <td>{{$paciente->apellidoMaterno}}</td>
            </tr>
            <tr>
              <td class="titles"> Fecha de Nacimiento :</td>
              <td>{{$paciente->fechaNacimiento}}</td>
            </tr>
            <tr>
              <td class="titles">Sexo :</td>
              <td>
                @if($paciente->sexo == 'M')Masculino
                @elseif($paciente->sexo == 'F')Femenino
                @endif
              </td>
            </tr>
            <tr>
              <td class="titles">Estado Civil :</td>
              <td>
                @if($paciente->estadoCivil == 'S')Soltero
                @elseif($paciente->estadoCivil == 'C')Casado
                @else Viudo
                @endif
              </td>
            </tr>
            <tr>
              <td class="titles">{{$paciente->tipoDocumento}} :</td>
              <td>{{$paciente->documento}}</td>
            </tr>
            <tr>
              <td class="titles">Dirección:</td>
              <td>{{$paciente->direccion}}</td>
            </tr>
            <tr>
              <td class="titles">Telefono:</td>
              <td>{{$paciente->telefono}}</td>
            </tr>
            <tr>
              <td class="titles">Celular:</td>
              <td>{{$paciente->celular1}}</td>
            </tr>
            <tr>
              <td class="titles">Celular Referencial:</td>
              <td>{{$paciente->celular1}}</td>
            </tr>
          </tbody>
      </table>
  </div>

        @else
        <div class="alert alert-danger">
          <strong>ERROR!</strong> PACIENTE NO ENCONTRADO !!!
        </div>
        @endif

@endsection
