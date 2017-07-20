<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::post('/mostrar',function(Illuminate\Http\Request $datos){
  return "Los datos enviados son: ".$datos->date_inicio." y ".$datos->date_final;
});
*/
//Route::resource('GraficoEstadistico','GraficoEstadisticoController') ;

Route::post('controlador12','GraficoEstadisticoController@store');
Route::post('controladorc','GraficoEstadisticoController@storec');
//Route::post('controladorp','GraficoEstadisticoController@storep',);

Route::get('controlador/{id}','GraficoEstadisticoController@index');

Route::get('diego', function () {
    return view('pacientes.buscar');
});
//*******************************************

Route::get('/estadistica/paciente',function(){
  return view('estadistica.paciente');
});

Route::get('/estadistica/medicos',function(){
  return view('estadistica.medicos');
});

Route::get('/estadistica/citas',function(){
  return view('estadistica.citas');
});

Route::get('/',function(){
  return view('welcome');
});

Route::get('medicamentos/asdf',function(){
	return view('Prescriptions.medicamentos.buscador');
});

Route::post('medicamentos/eliminar/{id}','MedicamentosController@eliminar');

Route::resource('medicamentos','MedicamentosController', ['parameters' => [
    'medicamentos' => 'medicamento'
]]);

Route::resource('medicinas','MedicinasController');

/*
	Presentaciones
*/
Route::get('presentaciones/todos','PresentacionesController@todos');
Route::resource('presentaciones','PresentacionesController', ['parameters' => [
    'presentaciones' => 'presentacion'
]]);



/*
	No se que es ...
*/
Route::get('med',function(){
	return view('Prescriptions.medicamentos.crear');
});

Route::resource('prescripcion','prescriptionController');

/*
Route::group(['prefix'=>'pacientes'],function(){

  Route::get('/','pacientesController@todos' );
  Route::get('todos','pacientesController@todos');

  Route::get('crear','pacientesController@crearObt' );
  Route::post('crear','pacientesController@crear');

  Route::get('{id}/eliminar','pacientesController@eliminarConfirm');
  Route::post('eliminar','pacientesController@eliminar');

  Route::get('{id}/editar','pacientesController@editar');
  Route::post('{id}','pacientesController@guardar');

  Route::get('buscar', 'pacientesController@buscar');

  Route::get('retrievePacientes', 'pacientesController@retrievePacientes');

  Route::get('{id}','pacientesController@mostrar' );

});*/
