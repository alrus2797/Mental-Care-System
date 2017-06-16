<div id="pre" class="container">
	
<div class="row" >
	<div class="col-md-2">
			
		<div class="jumbotron ">
		
		<label>{{$medicina->medicamento->nombre}}</label>
		<label>Presentación</label>
				<label>{{$medicina->cantidad}} {{$medicina->presentacion->unidad}} {{$medicina->presentacion->descripcion}}</label>
		</div>
	</div>
	<div class="col-md-5">
		<div class="jumbotron">
			
		<label>Descripción</label>
		<label>{{$medicina->medicamento->descripcion}} 
		El ácido acetilsalicílico o AAS (C9H8O4), conocido popularmente como aspirina, nombre de una marca que pasó al uso común, es un fármaco de la familia de los salicilatos. Se utiliza como medicamento para tratar el dolor (analgésico), la fiebre (antipirético) y la inflamación (antiinflamatorio), debido a su efecto inhibitorio, no selectivo, de la ciclooxigenasa.

</label>
		</div>
	</div>

	<div class="col-md-5">
		<div class="jumbotron">
			
		<label>Efectos Secundarios</label>
		<label>{{$medicina->medicamento->efecSecundarios}} 
		El ácido acetilsalicílico o AAS (C9H8O4), conocido popularmente como aspirina, nombre de una marca que pasó al uso común, es un fármaco de la familia de los salicilatos. Se utiliza como medicamento para tratar el dolor (analgésico), la fiebre (antipirético) y la inflamación (antiinflamatorio), debido a su efecto inhibitorio, no selectivo, de la ciclooxigenasa.

</label>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-md-5">
		<div class="jumbotron">
			
		<label>Adversos</label>
		<label>{{$medicina->medicamento->adversos}} 
		El ácido acetilsalicílico o AAS (C9H8O4), conocido popularmente como aspirina, nombre de una marca que pasó al uso común, es un fármaco de la familia de los salicilatos. Se utiliza como medicamento para tratar el dolor (analgésico), la fiebre (antipirético) y la inflamación (antiinflamatorio), debido a su efecto inhibitorio, no selectivo, de la ciclooxigenasa.
</label>
		</div>
	</div>
	<div class="col-md-7">
		<div class="jumbotron">
			
			
			<label>AQUÍ DEBERÍA IR LOS COMPONENTES</label>

		</div>
	</div>
	
</div>
</div>
<script type="text/javascript">
/*alertify.genericDialog || alertify.dialog('genericDialog',function(){
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
                    maximizable:true,
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
alertify.genericDialog ($('#pre')[0]).set('selector', 'input[type="password"]');*/
</script>