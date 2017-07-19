@extends('layouts.app')
@section('title', 'Registrar Persona')


@section('content')



<h2>Registro de Persona</h2>

<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">
      <form id="register-form" method="POST" action="{{asset('personas/crear')}}">
        {{csrf_field()}}
        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" >
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" >
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" >
          </div>
          <div class="col-sm-2"></div>
            <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
          <div class="col-sm-3">
            <select class="form-control" id="sexo" name="sexo">
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
              <option value="O">Otro</option>
            </select>
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni">
          </div>

          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
          <div class="col-sm-3">
            <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" >
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
               <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" >
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="email">Email:</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" >
          </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>


      </form>

    </div>


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

$.validator.addMethod('moretelephone',function(value,element){
  return this.optional(element)
  || /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i.test(value);

})

$.validator.addMethod('strongDNI',function(value,element){
  return this.optional(element)
  || value.length == 8;
},"ingreso un DNI <em>valido</em>\.")

$.validator.addMethod('checkDNI', function(value, element){
  var exist;
  var parametros = {
      "DNI" : value
  };
  $.ajax({
    data: parametros,
    url: 'checkDNI',
    type: 'get',
    dataType : 'json',
    async: false,
    success: function(data){
      if (data == null)
        exist = false;
      else
        exist = true;
    }
  });
  return !exist;
})

$("#register-form").validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    apellidopaterno: {
      required: true
    },
    apellidomaterno: {
      required: true
    },
    dni: {
      required: true,
      strongDNI: true,
      checkDNI: true
    },
    nombres: {
      required: true
    },
    telefono: {
      required: true,
      moretelephone: true

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
      dni: 'Ingrese un DNI <em>valido</em>.',
      strongDNI: 'Ingrese un DNI <em>valido</em>.',
      checkDNI: 'El DNI ya existe!'
    },
    apellidopaterno: {
      required: 'Este espacio es requerido.'
    },
    apellidomaterno: {
      required: 'Este espacio es requerido.'
    },
    nombres: {
      required: 'Este espacio es requerido.'
    },
    telefono: {
      required: 'Este espacio es requerido.',
      moretelephone: 'Ingrese un número de telefono valido.'
    },
    direccion: {
      required: 'Este espacio es requerido.'
    }
  }
});

});

</script>


@endsection
