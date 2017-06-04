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


Route::group(['prefix'=>'medicamentos'],function(){
	Route::get('crear','medicamentosController@crearGet');
	Route::post('crear','medicamentosController@crear');
	Route::get('{id}/crearPresentacion', 'medicamentosController@crearPresentacionGet');
	Route::post('{id}/crearPresentacion', 'medicamentosController@crearPresentacion');
	Route::get('{id}/borrar','medicamentosController@borrarGet');
	Route::post('{id}/borrar','medicamentosController@borrar');
	Route::get('/','medicamentosController@todos');


	Route::get('lala',function(){
		return view('Prescriptions.Medicamentos.presentacion');
	});
});	




























