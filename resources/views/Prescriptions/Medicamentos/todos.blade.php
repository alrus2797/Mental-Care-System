@extends('layouts.prescriptionsTemplate')

@section('title','Todos')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
    <br><br>
    <div class="col-md-10">   
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="text-center">
                <h3 class="panel-title">Mostrar Medicamentos</h3>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
               
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                    @foreach($medicamentos as $medicamento)
                      <tr>
                        <td>{{$medicamento -> nombre}} </td>
                        <th><a value="" href="{{url('medicamentos') . '/'.$medicamento->id .'/abrir' }}" type="button" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-list-alt"></i></a></th>
                        <th><a value="" href="{{url('medicamentos') . '/'.$medicamento->id .'/editar' }}" type="button" class="btn btn-xs btn-warning btn-info"><i class="glyphicon glyphicon-edit"></i></a></th>
                        <th><a value="" href="{{url('medicamentos') . '/'.$medicamento->id .'/eliminar' }}" type="button" class="btn btn-xs btn-danger btn-info"><i class="glyphicon glyphicon-remove"></i></a></th>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                    </div>


          </div>
        </div>
</div>


@endsection