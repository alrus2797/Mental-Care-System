@extends('layouts.template')
@section('title','Componentes')

@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('css/alertify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/default-alertify.min.css')}}">
<script  src="{{ asset('js/alertify.min.js')}}" ></script>

<form id="form">
	<h3>Componentes</h3>
	{{ csrf_field()}}
<div class="row">
  <div class="col-md-3">
  	<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">Nombre</span>
		  <input type="text" class="form-control" placeholder="Componente" aria-describedby="basic-addon1" name="nombre" required maxlength=="20">
	</div>
  </div>

  <div class="col-md-3">
	<button type="submit" class="btn btn-info">Crear</button>

  </div>

</div>



</div>

</form>

<div class="container">
  <div id="todos"></div>
</div>

<style type="text/css">
  #todos{
    padding-top: 25px;
  }

</style>

<script type="text/javascript">
$("#todos" ).load("{{ asset('componentes/todos') }}" );

$('#form').submit(function () {
  $.post("{{ asset('componentes')}}", $('#form').serialize()).done(function(){
     $("#todos").load("{{ asset('componentes/todos') }}" );
     $("form")[0].reset();
     alertify.success('Creado con Exito');
  });

  return false;
});


function eliminar(id) {

  alertify.confirm('Confirmar', 'Desea eliminar este componentes?',
    function(){

      var urls = "{{asset('presentaciones')}}"+"/"+id;
      console.log(urls);
        $.ajax({
          url: urls ,
          type: "POST",
          data: { _token : "{{csrf_token()}}" , _method: 'delete' },
        })
        .done(function( data ) {
          console.log( data );
          $("#todos").load("{{ asset('presentaciones/todos') }}" );
          alertify.success('Borrado Con Éxito');
        });

    },
    function(){ alertify.error('Cancelado')}

  );
}

function editar(id){
  var url = "{{ asset('componentes/') }}";  
  $.get( url + "/" + id + "/edit" , function( data ) {
    alertify.alert('Editar Presentación', data );
  });
}


</script>

@endsection
