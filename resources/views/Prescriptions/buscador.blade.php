

<form action="{{asset('pacientes/historial')}}" method="POST">
<div class="row">


	<div class="form-group col-md-5 col-md-offset-2">
		{{csrf_field()}}
		<div class="input-group">
		<div class="input-group-addon">
			<span class="glyphicon glyphicon-search"></span>
		</div>
		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Buscar paciente ..." onkeyup="showPres($('#nombre').val())">
		<input  type="hidden" name="paciente_id" value="1">
		</div>
	</div>

</form>


</div>

</script>
