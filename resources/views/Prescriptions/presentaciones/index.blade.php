@extends('layouts.prescriptionsTemplate')
@section('title','Presentaciones')

@section('content')

<form action="{{asset('presentaciones')}}" method="post">
	<h3>Presentaciones</h3>
	{{ csrf_field()}} 
<div class="row">
  <div class="col-md-3">
  	<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" class="form-control" placeholder="descripcion" aria-describedby="basic-addon1" name="descripcion">
	</div>	
  </div>

  <div class="col-md-3">
	<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">U</span>
  		<input type="text" class="form-control" placeholder="unidad" aria-describedby="basic-addon1" name="unidad">
	</div>
  </div>
</div>

<button type="submit" class="btn btn-info">Crear</button>

</form>


<h1>All Presentaciones</h1>

 <table class="table table-condensed">
    <thead>
      <tr>
        <th>id</th>
        
        <th>Presentacion</th>
        
        <th>Unidad</th>
        <th>Ver</th>
        <th>Edi</th>
        <th>Elimi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($presentaciones as $p)
      <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->descripcion}}</td>
         
        <td>{{$p->unidad}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>


@endsection