

@extends('layouts.app')
@section('title', 'Inicio')



@section('content')
<h3>Prescripciones</h3>
<div id="buscador">   </div>
<h3>Mis Prescripciones</h3>

<div class="container">
  <div id="todos"></div>
</div>

<div id="ver">

</div>

<script type="text/javascript">
   $("#buscador").load("{{asset('pres/buscador')}}");
  $("#todos" ).load("{{ asset('prescripcion/todos') }}" );
  </script>



<script type="text/javascript">
	function ver(id) {
    $.ajax({
        url: "{{asset('prescripcion')}}"+"/"+id,
        type: 'get',
       success: function(resultado){
          console.log(resultado);
            $("#ver").html(resultado);
        }});
  }

	function editar() {
		// body...
	}
	function eliminar() {
		// body...
	}

	function mas() {
		// body...
	}
  function showPres(nom) {
    var datos={
      "nom":nom,
    };
    $.ajax({
      data:datos,
      url:'getPres',
      type:'get',
      dataType:'json',
      success:function(data){
        $("#todos").html(data);
      }
    });

  }
</script>
@endsection
