
<form id="formEdit" action="{{asset('componentes')}}/{{ $componente->id}}" method="post">
	<h3>Componentes</h3>
	{{ method_field('PUT') }}
	{{ csrf_field()}}
<div class="row">

  <div class="col-md-7">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Nombre</span>
      <input type="text" class="form-control"  value="{{$componente->nombre}} " aria-describedby="basic-addon1" name="nombre" required maxlength=="20">
  </div>
  </div>

  <div class="col-md-3">
    	<button type="submit" class="btn btn-info">Editar</button>
  </div>



</div>

</form>
