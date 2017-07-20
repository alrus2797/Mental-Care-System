<form id="crear_comp" action="{{url('componentes/create')}}" method="post">
  <div class="container">
    <h3>Nuevo Componente</h3>
    {{ csrf_field()}}
  <div class="row">
    <div class="form-group col-md-4">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-4">
      <br>
      <button type="submit" class="btn btn-default btn-large">Crear componente </button>
    </div>
  </div>



</form>
<script type="text/javascript">

var alert=alertify.genericDialog ($('#crear_comp')[0]).set('selector', 'input[type="password"]');
  $(function(){
    $('form').submit(function ()
      {
        //alert.destroy();
        return false;
      });
});


</script>
