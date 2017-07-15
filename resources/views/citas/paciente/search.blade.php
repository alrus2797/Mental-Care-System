{!!Form::open(array('url'=>'citas/paciente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
	
	<div class="form-group margintop-20">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Buscar paciente por nombre, etc" value="{{$searchText}}">
			<span class="input-group-btn">
				<a href=""><button type="submit" class="btn btn-success">Buscar Ahora</button></a>				
			</span>
			
		</div>
	</div>

{{Form::close()}}
