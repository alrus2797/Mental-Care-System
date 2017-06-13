@extends('layouts.prescriptionsTemplate')
@section('title','Presentaciones')

@section('content')

<form>
	<h3>Presentaciones</h3>
	{{ csrf_field()}} 
<div class="row">
  <div class="col-md-3 col-md-offset-1">
  	<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div>	
  </div>
</div>

</form>


@endsection