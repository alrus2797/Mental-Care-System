@extends('layouts.app')
@section('title', 'Editar Persona')

@section('content')

<h2>Edicion de Persona</h2>

<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">
      <form id="register-form" method="POST" action="{{asset('personas/editar')}}">
        {{csrf_field()}}
        <input type="hidden" id="id" name="id" value="{{$get->id}}">
        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$get->apellidopaterno}}" >
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$get->apellidomaterno}}">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$get->nombres}}">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
          <div class="col-sm-3">
            <select class="form-control" id="sexo" name="sexo">
              <option value="M" @if ("M" == $get->sexo) selected @endif>Masculino</option>
              <option value="F" @if ("F" == $get->sexo) selected @endif>Femenino</option>
              <option value="O" @if ("O" == $get->sexo) selected @endif>Otro</option>
            </select>
          </div>

        </div>



        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$get->dni}}">
          </div>
          <div class="col-sm-2"></div>
            <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
          <div class="col-sm-3">
            <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento" value="{{$get->fechanacimiento}}">  
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$get->direccion}}" >
          </div>
          <div class="col-sm-2"></div>
            <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$get->telefono}}">
          </div>
        </div>

        <div class="form-group col-sm-12">
            <label class="col-sm-2 col-form-label" for="email">Email:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$get->email}}" >
          </div>
          <div class="col-sm-2"></div>
          <div class="col-sm-2"></div>
          <div class="col-sm-3">

          </div>
        </div>


        <div class="form-group col-sm-12">
            <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
          <div class="col-sm-3">
            <label class="form-control" id="registro" name="registro">{{$get->created_at}}</label>
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
          <div class="col-sm-3">
               <label class="form-control" id="actualizacion" name="actualizacion">{{$get->updated_at}}</label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{asset('personas')}}">Cancelar</a>

      </form>

    </div>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>


<script>
$(function() {

$.validator.setDefaults({
  errorClass: 'help-block',
  highlight: function(element) {
    $(element)
      .closest('.form-group')
      .addClass('has-error');
  },
  unhighlight: function(element) {
    $(element)
      .closest('.form-group')
      .removeClass('has-error');
  },
  errorPlacement: function (error, element) {
    if (element.prop('type') === 'checkbox') {
      error.insertAfter(element.parent());
    } else {
      error.insertAfter(element);
    }
  }
});

$.validator.addMethod('strongPassword', function(value, element) {
  return this.optional(element)
    || value.length >= 6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
}, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

$.validator.addMethod('strongDNI',function(value,element){
  return this.optional(element)
  || value.length == 8;
},"ingreso un DNI <em>valido</em>\.")

$("#register-form").validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    apellidopaterno: {
      required: true,
      nowhitespace: true,
      lettersonly: true
    },
    apellidomaterno: {
      required: true,
      nowhitespace: true,
      lettersonly: true
    },
    dni: {
      required: true,
      strongDNI: true
    },
    nombres: {
      required: true
    },
    telefono: {
      required: true,
      digits: true,

    },
    direccion: {
      required: true
    }
  },
  messages: {
    email: {
      required: 'Este espacio es requerido.',
      email: 'Ingrese un correo electronico <em>valido</em>.'
    },
    dni: {
      required: 'Este espacio es requerido.',
      dni: 'Ingrese un dni <em>valido</em>.',
      strongDNI: 'Ingrese un dni <em>valido</em>.'
    },
    apellidopaterno: {
      required: 'Este espacio es requerido.',
      nowhitespace: 'No se permiten espacios en blanco.',
      lettersonly: 'Solo letras.'
    },
    apellidomaterno: {
      required: 'Este espacio es requerido.',
      nowhitespace: 'No se permiten espacios en blanco.',
      lettersonly: 'Solo letras.'
    },
    nombres: {
      required: 'Este espacio es requerido.'
    },
    telefono: {
      required: 'Este espacio es requerido.',
      digits: 'Ingrese solo numeros.'
    },
    direccion: {
      required: 'Este espacio es requerido.'
    }
  }
});

});

</script>


@endsection
