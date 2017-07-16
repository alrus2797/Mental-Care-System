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

//********testing

Route::get('test',function(){
  $faker=Faker\Factory::create("es_PE");
  return $faker->realtext;
});


Route::get('diego', function () {
    return view('pacientes.buscar');
});
//*******************************************

Route::get('/',function(){
  return view('welcome');
});

Route::get('medicamentos/asdf',function(){
	return view('Prescriptions.medicamentos.buscador');
});

Route::get('componentes/seleccionar',function(){
  return view('Prescriptions.componentes.seleccionar');
});

Route::post('medicamentos/eliminar/{id}','MedicamentosController@eliminar');

Route::resource('medicamentos','MedicamentosController', ['parameters' => [
    'medicamentos' => 'medicamento'
]]);

Route::resource('medicinas','MedicinasController');

//Componentes
Route::get('componentes/todos','ComponentesController@todos');
Route::resource('componentes','ComponentesController', ['parameters' => [
    'componentes' => 'componente'
]]);
Route::get('obtenerComponentes', 'ComponentesController@obtenerComponentes'); 

///***********************************************************

/*
	Presentaciones
*/
Route::get('presentaciones/todos','PresentacionesController@todos');
Route::resource('presentaciones','PresentacionesController', ['parameters' => [
    'presentaciones' => 'presentacion'
]]);
Route::get('obtenerPresentaciones', 'PresentacionesController@obtenerPresentaciones'); 


//Route::get('prescripcion/todos','PrescriptionController@todos');


/*
	No se que es ...
*/
Route::get('med',function(){
	return view('Prescriptions.medicamentos.crear');
});
//******************************************************************************************
//Route::resource('prescripcion','prescriptionController');
/*Route::get('pres',function(){
  return view('Prescriptions.index');
});
¨*/
Route::get('pres/buscador',function(){
  return view('Prescriptions.buscador');
});

Route::resource('prescripcion','PrescriptionController',['parameters'=>[
  'prescriptions'=>'prescription'
  ]]);

//Route::get('pacientes/historia',function(){
  //return view('pacientes.historial');
//});
Route::post('pacientes/historial','pacientesController@historial');

Route::get('pres/crear',function(){
  return view('Prescriptions.crear');
});

//******************************************************************************************

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

});

Route::get('/reportes', function(){
	return view('ManageReporting.index');
});

Route::get('/reportes/repTratamiento', function(){
	return view('ManageReporting.repTratamiento');
});

Route::get('/reportes/repAtencion', function(){
	return view('ManageReporting.repAtencion');
});

Route::get('/reportes/repFarmacos', function(){
	return view('ManageReporting.repFarmacos');
});

Route::get('/reportes/repAtendidos', function(){
	return view('ManageReporting.repAtendidos');
});

Route::get('/reportes/repMedRecetados', function(){
	return view('ManageReporting.repMedRecetados');
});


Route::get('/reportes/repAtencion','consultasSqlController@queryAtencion');

Route::resource('citas/citas','CitasController');
Route::resource('citas/paciente','PacienteController');
