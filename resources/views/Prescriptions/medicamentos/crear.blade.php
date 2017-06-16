	
		
<form id="crear" action="{{ asset('medicamentos')  }}" method="post">
<div class="container">
	<h3>Nuevo Medicamento</h3>
{{ csrf_field()}} 
<div class="row">
	<div class="form-group col-md-4">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre">
	</div>
	<div class="form-group col-md-3">
		<label for="cantidad">Cantidad</label>
		<input type="number" class="form-control" id="cantidad" name="cantidad">
	</div>

	<div class="form-group col-md-3">
		<label for="presentacion">Presentación</label>
		<select class="form-control" name="presentacion" id="presentacion">
			@foreach ($presentaciones as $p)
			<option value="{{ $p->id }}">{{ $p->unidad}} {{ $p->descripcion}}</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group col-md-2">
	<br>	

<button id="" type="button" class="btn btn-default btn-large"> <a href="{{asset('presentaciones')}} "><i class="glyphicon glyphicon-plus"></i> Añadir presentación </a></button>


	</div>
</div>
<div class="row">
	<div class="form-group col-md-4">
		<label for="descripcion">Descripción</label>
		<textarea id="descripcion" class="form-control" rows="5" name="descripcion"></textarea>
	</div>

	<div class="form-group col-md-4">
		<label for="efectos">Efectos Secundarios</label>
		<textarea id="efectos" class="form-control" rows="5" name="efectos"></textarea>
	</div>
	<div class="form-group col-md-4">
		<label for="adversos">Efectos Adversos</label>
		<textarea id="adversos" class="form-control" rows="5" name="adversos"></textarea>
	</div>
</div>

	<div class="row">
	<div class="col-md-3 col-md-offset-3">

	<button id="nuevo" type="button" class="btn btn-default btn-large">Crear Medicamento </button>
	</div>
		
	</div>
	</div>
</form>


<script type="text/javascript">
alertify.genericDialog || alertify.dialog('genericDialog',function(){
    return {
        main:function(content){
            this.setContent(content);
        },
        setup:function(){
            return {
                focus:{
                    element:function(){
                        return this.elements.body.querySelector(this.get('selector'));
                    },
                    select:false
                },
                options:{
                    basic:true,
                    maximizable:true,
                    resizable:true,
                    padding:true
                }
            };
        },
        settings:{
            selector:undefined
        }
    };
});
//force focusing password box
alertify.genericDialog ($('#crear')[0]).set('selector', 'input[type="password"]');
</script>