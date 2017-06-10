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

Route::get('/', function () {
    return view('prueba');
});



Route::get('prueba', function(){
	return view('prueba');
});
Route::get('side',function(){
	return view('Prescriptions.sidebar');
});

Route::resource('prescripcion','prescriptionController');


Route::group(['prefix'=>'pacientes'],function(){

  Route::get('/','pacientesController@todos' );

  Route::get('crear','pacientesController@crearObt' );
  Route::post('crear','pacientesController@crear');

  Route::get('{id}','pacientesController@mostrar' );

  Route::get('{id}/eliminar','pacientesController@eliminarConfirm');
  Route::post('eliminar','pacientesController@eliminar');

  Route::get('{id}/editar','pacientesController@editar');
  Route::post('{id}','pacientesController@guardar');

});
