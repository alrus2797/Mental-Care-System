

<form action="{{asset('pacientes/historial')}}" method="POST">
<div class="row">


	<div class="form-group col-md-5 col-md-offset-2">
		{{csrf_field()}}
		<div class="input-group">
		<div class="input-group-addon">
			<span class="glyphicon glyphicon-search"></span>
		</div>
		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Buscar paciente ...">
		<input  type="hidden" name="paciente_id" value="1">
		</div>
	</div>
	<div class="col-md-2">
	<button id="nuevo" type="submit" class="btn btn-default btn-large">Buscar</button>
	</div>

</form>


<div class="col-md-2">
	<button id="nuevo" type="button" class="btn btn-default btn-large">NO RECUERDO PARA QUE ERA ESTE BOTÓN</button>
</div>
</div>

</script>
