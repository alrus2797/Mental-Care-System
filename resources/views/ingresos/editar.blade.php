@extends('layouts.app')
@section('title', 'Editar Ingreso')

@section('content')

 <h2>Edición de Ingreso</h2>
<div id="PacienteEditar" class="row">



<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px" >
    <form id="register-form5" method="POST" action="{{asset('ingresos/'.$get->id)}}">

        {{csrf_field()}}


        <input type="hidden" id="ingreso_id" name="ingreso_id" value="{{$get->id}}">


    <div class="form-group col-sm-12">
      <label class="col-sm-2 col-form-label" for="fecha">Fecha de Ingreso (Admisión):</label>
      <div class="col-sm-6">
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{$get->fecha}}">
      </div>
    </div>


      <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
          <div class="col-sm-3">
            <label class="form-control" id="registro" name="registro">{{$get->created_at}}</label>
          </div>
          <div class="col-sm-2"> </div>
          <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
          <div class="col-sm-3">
               <label class="form-control" id="actualizacion" name="actualizacion">{{$get->updated_at}}</label>
          </div>
      </div>



      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="{{asset('ingresos')}}">Cancelar</a>

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

$.validator.addMethod('strongPassword', function(value, element) {
  return this.optional(element)
    || value.length >= 6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
}, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

$.validator.addMethod('moretelephone',function(value,element){
  return this.optional(element)
  || /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i.test(value);

})

$.validator.addMethod('strongDNI',function(value,element){
  return this.optional(element)
  || value.length == 8;
},"ingreso un DNI <em>valido</em>\.")

$("#register-form5").validate({
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
      strongDNI: true
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
      dni: 'Ingrese un dni <em>valido</em>.',
      strongDNI: 'Ingrese un dni <em>valido</em>.'
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
