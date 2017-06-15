@extends('layouts.prescriptionsTemplate')
@section('title','Presentaciones')

@section('content')

<form id="form" action="{{asset('presentaciones')}}" method="post">
	<h3>Presentaciones</h3>
	{{ csrf_field()}} 
<div class="row">
  <div class="col-md-3">
  	<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" class="form-control" placeholder="descripcion" aria-describedby="basic-addon1" name="descripcion">
	</div>	
  </div>

  <div class="col-md-3">
	<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">U</span>
  		<input type="text" class="form-control" placeholder="unidad" aria-describedby="basic-addon1" name="unidad">
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
$("#todos" ).load("{{ asset('presentaciones/todos') }}" );

$('#form').submit(function () {
  $("#todos").load("{{ asset('presentaciones/todos') }}" );
  $("#form") .ajaxForm({url: "{{ asset('presentaciones')}}", type: 'post'})
  return false;
});
</script>

@endsection