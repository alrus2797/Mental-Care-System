<div class="row">
	<div class="col-md-1">
		<p>Buscar por: </p>
	</div>
	<div class="col-md-2">
	<select class="form-control">
	  <option>Medicamento</option>
	  <option>Componente</option>
	</select>
	</div>

	<div class="form-group col-md-4">
		<div class="input-group">
		<div class="input-group-addon">
			<span class="glyphicon glyphicon-search"></span>
		</div>
		<input type="text" class="form-control" id="nombre" name="nombre">
		</div>
	</div>
	<div class="col-md-4">
	<button id="nuevo" type="button" class="btn btn-default btn-large">Nuevo Medicamento </button>
		
	</div>

</div>
<div id="crear"></div>
<script type="text/javascript">

	$("#nuevo").click(function(){
        $.ajax({url: "{{asset('medicamentos/create')}} ", success: function(resultado){
            $("#crear").html(resultado);
        }});
    });
</script>
