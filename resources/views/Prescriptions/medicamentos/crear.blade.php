	<div class="container">
		
	<h3>Nuevo Medicamento</h3>
<form id="crear" action="{{ asset('medicamentos')  }}" method="post">
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
		<style type="text/css">
			.btn-circle.btn-lg {
			  width: 40px;
			  height: 40px;
			  padding: 0.1px 5.5px;
			  font-size: 30px;
			  line-height: 0.8;
			  border-radius: 50px;
			}
		</style>
		<button type="button" class="btn btn-info btn-circle btn-lg"><i class="glyphicon glyphicon-plus"></i></button>
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

	<button type="submit" class="btn btn-primary btn-lg">Crear Medicamento</button>
	</div>
		
	</div>
</form>

	</div>

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
                    select:true
                },
                options:{
                    basic:true,
                    //maximizable:true,
                    resizable:false,
                    padding:false
                }
            };
        },
        settings:{
            selector:undefined
        }
    };
});
//force focusing password box
alertify.genericDialog ($('#crear')[0]).set({'startMaximized':true}, 'selector', 'input[type="password"]');
</script>