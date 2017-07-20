@extends('layouts.app')
@section('title', 'Registrar Estado de Paciente')


@section('content')

<h2>Registro de Estado de Paciente</h2>

<div >
  <form id="register-form4" method="POST" action="{{asset('pacientes/estados/crear')}}">

{{csrf_field()}}



   <div class="form-group">
    <label class="col-sm-2 col-form-label" for="nombre">Nombre de Estado:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de estado" name="nombre" >
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

$.validator.addMethod('strongEstado', function(value, element) {
  return this.optional(element)
    || value.length <= 20;
}, 'No sobrepasar los 20 caracteres\'.')


$("#register-form4").validate({
  rules: {
    nombre: {
      required: true,
      strongEstado: true
    }
  },
  messages: {
    nombre: {
      required: 'Este espacio es requerido.',
      strongEstado: 'No sobrepasar los 20 caracteres.'
    }
  }
});

});

</script>


@endsection
