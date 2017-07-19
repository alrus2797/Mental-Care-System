
<form id="crear" action="{{ asset('prescripcion')  }}" method="post">
	<div class="">
			<h3>Añadir receta</h3>
			{{ csrf_field()}}

			<div class="form-group ">
				<label for="nombre">Pacientes</label>
				<input type="text" class="form-control" id="nombre" name="paciente"   readonly>
			</div>
			<div class="form-group ">
				<label for="observacion"> Observaciones</label>
				<input type="text" class="form-control" id="obs" name="observacion">
				<input type="hidden" name="medico_id" value="1">
			</div>
			<div class="form-group ">
				<label > Instrucción</label>
				<input type="text" class="form-control" id="inst" name="instruccion">
			</div>
			<div class="form-group ">
				<script type="text/javascript">
					$('#medicamentos').multiSelect();
				</script>
				<label > Medicamentos</label>
				<select id='medicamentos' multiple='multiple' name="medicamentos[]">
					@foreach($medicamentos as $m)
							<option value='{{$m->id}}' >{{$m->nombre}}</option>
					@endforeach
				</select>
					<br>
					<button id="" type="button" class="btn btn-default btn-large"> <a href="{{asset('medicamentos')}} "><i class="glyphicon glyphicon-plus"></i> Añadir medicamentos </a></button>

			</div>

		<button id="truuuuue" type="submit" class="btn btn-default btn-large">Añadir</button>
	</div>




</form>

<script type="text/javascript">

$("#nombre").attr("placeholder",paciente);

alertify.genericDialog || alertify.dialog('genericDialog',function factory(){
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
				hooks: {
					onshow: function() {
						this.elements.dialog.style.height = '540px';
						this.elements.dialog.style.width = '1320px';
					}
				},
        settings:{
            selector:undefined
        }
    };
},true,'alert');
//force focusing password box
alertify.genericDialog ($('#crear')[0]).set('selector', 'input[type="password"]');
</script>
