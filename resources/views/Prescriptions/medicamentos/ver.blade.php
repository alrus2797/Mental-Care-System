<div id="vista" class="container">
	<div class="row">
		<div class="col-md-2">
			<label>Medicamento : </label>
			<label>{{$medicina->medicamento->nombre}} </label>
		</div>

		<div class="col-md-5">
			<label>Descripción : </label>
			<label>{{$medicina->medicamento->descripcion}} 
		</div>
		
		<div class="col-md-5">
			<label>Efectos Secundarios: </label>
		<label>{{$medicina->medicamento->efecSecundarios}} </label>
		</div>

	</div>

	<div class="row">
		<div class="col-md-2">
			<label>Presentación: </label>
			<label>{{$medicina->cantidad}} {{$medicina->presentacion->unidad}} {{$medicina->presentacion->descripcion}}</label>
		</div>
		<div class="col-md-5">
			<label>Efectos Secundarios: </label>
			<label>{{$medicina->medicamento->efecSecundarios}} </label>			
		</div>
		<div class="col-md-5">
			<label>Adversos: </label>
			<label>{{$medicina->medicamento->adversos}}</label>
		</div>
	</div>
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
                    maximizable:true,
                    resizable:true,
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
alertify.genericDialog ($('#vista')[0]).set('selector', 'input[type="password"]',{'startMaximized':true});
</script>