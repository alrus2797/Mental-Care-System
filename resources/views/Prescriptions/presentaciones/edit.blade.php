
<form id="formEdit" action="{{asset('presentaciones')}}/{{ $presentacion->id}}" method="post">
	<h3>Presentaciones</h3>
	{{ method_field('PUT') }}
	{{ csrf_field()}} 
<div class="row">
  
  	<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" class="form-control" value="{{ $presentacion->descripcion}}"aria-describedby="basic-addon1" name="descripcion" required maxlength="5">
	</div>	
</div>

<br>
  <div class="row">
	<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">U </span>
  		<input type="text" class="form-control" value="{{$presentacion->unidad}}" aria-describedby="basic-addon1" name="unidad" required maxlength="15">
	</div>
  </div>
 <br>
  <div class="row">

	<button type="submit" class="btn btn-info">Editar</button>
  	
  </div>

</div>


	
</div>

</form>
