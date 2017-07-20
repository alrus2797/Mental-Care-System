
<form id="crear" action="{{ asset('prescripcion')  }}" method="post">
	<div class="">
			<h3>Añadir receta</h3>
			{{ csrf_field()}}

			<div class="form-group ">
				<label for="nombre">Paciente</label>
				<input type="text" class="form-control" id="nombre" name="paciente"   readonly>
				<input type="hidden" name="paciente_id" value="" id="paciente_id">
			</div>
			<div class="form-group ">
				<label for="observacion"> Observaciones</label>
				<input type="text" class="form-control" id="obs" name="observacion">
				<input type="hidden" name="medico_id" value="{{Auth::user()->id}}">
			</div>
			<div class="form-group ">
				<label > Instrucción</label>
				<input type="text" class="form-control" id="inst" name="instruccion">
			</div>
			<div class="form-group ">
				<script type="text/javascript">

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

$("#nombre").attr("placeholder",nombre);
$("#paciente_id").attr("value",paciente);
var actual;
var url="{{asset('pacientes/alergias/')}}/";
$('#medicamentos').multiSelect({
	afterSelect: function(value){
		//actual=value;
		if($.inArray(value[0],alergias)!=-1)//Se encontró alergia en el medicamento seleccionado
		{
				var medicina=$("#medicamentos")[0].options[value-1].innerText;
			alertify.alert("<div class='alert alert-danger' role='alert'> El paciente es alérgico a uno de los componentes de " +medicina+
			" <br><br><button type='button' class='btn btn-default btn-large'> <a href="+url+paciente+"><i class='glyphicon glyphicon-eye-open'></i> Ver alergias de paciente </a></button></div>");
		}

	}
});
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
