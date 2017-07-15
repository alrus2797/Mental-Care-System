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


Route::group(['prefix'=>'pacientes'],function(){

  Route::get('/','pacientesController@todos' );
  Route::get('todos','pacientesController@todos');

  Route::get('crear','pacientesController@crearObt' );

  Route::get('retrievePacientes', 'pacientesController@retrievePacientes');

  Route::get('retrievePersonasDNI', 'pacientesController@retrievePersonasDNI');

  Route::get('llenarPaciente', 'pacientesController@llenarPaciente');
  Route::get('agregar', 'pacientesController@agregar');

  Route::get('{id}/eliminar','pacientesController@eliminarConfirm');
  Route::post('eliminar','pacientesController@eliminar');

  Route::get('{id}/editar','pacientesController@editar');
  Route::post('{id}','pacientesController@guardar');

  Route::get('buscar', 'pacientesController@buscar');


  Route::get('{id}','pacientesController@mostrar' );

});

Route::group(['prefix'=>'personas'],function(){

  Route::get('/','personasController@todos' );
  Route::get('todos','personasController@todos');

  Route::get('crear','personasController@crearObt' );
  Route::post('crear','personasController@crear');

  Route::get('{id}/eliminar','personasController@eliminarConfirm');
  Route::post('eliminar','personasController@eliminar');

  Route::get('{id}/editar','personasController@editar');
  Route::post('{id}','personasController@guardar');

  Route::get('buscar', 'personasController@buscar');


  Route::get('retrievePersonas', 'personasController@retrievePersonas');


  Route::get('{id}','personasController@mostrar' );

});


Route::group(['prefix'=>'pacientes/estados'],function(){

  Route::get('/','pacientesEstadosController@todos' );
  Route::get('todos','pacientesEstadosController@todos');

  Route::get('crear','pacientesEstadosController@crearObt' );
  Route::post('crear','pacientesEstadosController@crear');

  Route::get('{id}/eliminar','pacientesEstadosController@eliminarConfirm');
  Route::post('eliminar','pacientesEstadosController@eliminar');

  Route::get('{id}/editar','pacientesEstadosController@editar');
  Route::post('{id}','pacientesEstadosController@guardar');

  Route::get('buscar', 'pacientesEstadosController@buscar');


  Route::get('retrievePersonas', 'pacientesEstadosController@retrievePersonas');


  Route::get('{id}','pacientesEstadosController@mostrar' );

});
