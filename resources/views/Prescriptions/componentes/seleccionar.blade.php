<div id="selec_comp">
  Hola como estas
</div>
<script type="text/javascript">
//$$$('crear_comp').text("Hola soy nuevo");
nombre="hola";

  alertify.dialog('seleccionar',function (){
    return {
      main:function(content){
        this.setContent(content);
        
      }

    }
  },true,'alert');

alertify.seleccionar($('#selec_comp')[0]);


</script>
