@extends('layouts.app')
@section('title','Presentaciones')

@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('css/alertify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/default-alertify.min.css')}}">
<script  src="{{ asset('js/alertify.min.js')}}" ></script>

<form id="form" method="post" action="{{ asset('presentaciones')}}">

  <div class="text-center">
  <br><h2>Presentaciones</h2><br><br>
  </div>
	{{ csrf_field()}}

  <div class="col-md-3">
  	<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" class="form-control" placeholder="Descripción" aria-describedby="basic-addon1" name="descripcion" required maxlength=="5">
	</div>
  </div>

  <div class="col-md-3">
	<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">U</span>
  		<input type="text" class="form-control" placeholder="Unidad (mg,ml)" aria-describedby="basic-addon1" name="unidad" required maxlength=="15">
	</div>
  </div>

  <div class="col-md-3">
	<button type="submit" class="btn btn-info">Crear</button>
  </div>
</form>

<form>
	<div class="col-md-3">
	    <div class="input-group">
	    <div class="input-group-addon">
	      <span class="glyphicon glyphicon-search"></span>
	    </div>
	    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion" onkeyup="showPresentaciones($('#descripcion').val(), $('#unidad').val())">
	    </div>
	</div><br><br>
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
$("#todos" ).load("{{ asset('presentaciones/todos') }}" );

$('#form').submit(function () {
  $.post("{{ asset('presentaciones')}}", $('#form').serialize()).done(function(){
     $("#todos").load("{{ asset('presentaciones/todos') }}" );
     $("form")[0].reset();
     alertify.success('Creado con Exito');
  });

  return false;
});


function eliminar(id) {

  alertify.confirm('Confirmar', 'Desea eliminar este usuario?',
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
  var url = "{{ asset('presentaciones/') }}";
  $.get( url + "/" + id + "/edit" , function( data ) {
    alertify.alert('Editar Presentación', data );
  });
}

function showPresentaciones(descrip, uni) {
    var datos = {
      "descrip" : descrip,
      "uni" : uni,
    };
    $.ajax({
      data: datos,
      url: 'obtenerPresentaciones',
      type: 'get',
      dataType : 'json',
      success: function(data){
        $("#todos").html(data);
      }
    });
}

</script>

@endsection
