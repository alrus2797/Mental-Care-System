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

use Illuminate\Http\Request;

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


Route::group(['prefix'=>'pacientes'],function(){

  Route::get('/','pacientesController@todos' );
  //Route::get('todos','pacientesController@todos');

  Route::get('crear','pacientesController@crearObt' );

  Route::get('crearNuevaPersona','pacientesController@crearNuevaPersona' ); //Testing
  Route::post('crearPersonaPaciente','pacientesController@crearPersonaPaciente' );

  Route::get('retrievePacientes', 'pacientesController@retrievePacientes');

  Route::get('retrievePersonasDNI', 'pacientesController@retrievePersonasDNI');

  Route::get('llenarPaciente', 'pacientesController@llenarPaciente');
  Route::post('agregar', 'pacientesController@agregar');

  Route::get('{id}/eliminar','pacientesController@eliminarConfirm');
  Route::post('eliminar','pacientesController@eliminar');

  Route::get('{id}/editar','pacientesController@editar');
  Route::post('{id}','pacientesController@guardar');

  Route::get('buscar', 'pacientesController@buscar');


  Route::get('{id}','pacientesController@mostrar' );

});

Route::get('/reportes', function(){
	return view('ManageReporting.index');
});

Route::get('/reportes/repTratamiento', function(Request $request){
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

Route::get('/reportes/descargarRep', function(){
	return view('ManageReporting.descargarRep');
});

Route::get('/reportes/repAtencion','consultasSqlController@queryAtencion');
Route::get('/reportes/repAtendidos','consultasSqlController@queryAtendidos');
Route::get('/reportes/repFarmacos','consultasSqlController@queryFarmacos');
Route::get('/reportes/repMedRecetados','consultasSqlController@queryMedRecetados');
Route::get('/reportes/repTratamiento','consultasSqlController@queryTratamiento');

Route::resource('citas/citas','CitasController');
Route::resource('citas/paciente','PacienteController');
Route::group(['prefix'=>'personas'],function(){

  Route::get('/','PersonasController@todos' );
  Route::get('todos','PersonasController@todos');

  Route::get('crear','PersonasController@crearObt' );
  Route::post('crear','PersonasController@crear');


  Route::get('{id}/eliminar','PersonasController@eliminarConfirm');
  Route::post('eliminar','PersonasController@eliminar');

  Route::get('{id}/editar','PersonasController@editar');
  Route::post('{id}','PersonasController@guardar');

  Route::get('buscar', 'PersonasController@buscar');


  Route::get('retrievePersonas', 'PersonasController@retrievePersonas');


  Route::get('{id}','PersonasController@mostrar' );

});


Route::group(['prefix'=>'pacientes/estados'],function(){

  Route::get('/','PacientesEstadosController@todos');
  Route::get('todos','PacientesEstadosController@todos');

  Route::get('crear','PacientesEstadosController@crearObt' );
  Route::post('crear','PacientesEstadosController@crear');

  Route::get('{id}/eliminar','PacientesEstadosController@eliminarConfirm');
  Route::post('eliminar','PacientesEstadosController@eliminar');

  Route::get('{id}/editar','PacientesEstadosController@editar');
  Route::post('{id}','PacientesEstadosController@guardar');

  //Route::get('buscar', 'pacientesEstadosController@buscar');


  //Route::get('retrievePersonas', 'pacientesEstadosController@retrievePersonas');


  Route::get('{id}','PacientesEstadosController@mostrar' );

});

Route::get('/reportes/descargarRep','descargasRepController@queryArchivosRep');
