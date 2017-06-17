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


Route::get('side',function(){
	return view('Prescriptions.sidebar');
});
//*******************************************
Route::get('medicamentos/asdf',function(){ 
	return view('Prescriptions.medicamentos.buscador');
});

Route::post('medicamentos/eliminar/{id}','MedicamentosController@eliminar');

Route::resource('medicamentos','MedicamentosController');

Route::resource('medicinas','MedicinasController');

/*
	Presentaciones
*/

Route::get('presentaciones/todos','PresentacionesController@todos');
Route::resource('presentaciones','PresentacionesController');

Route::get('med',function(){
	return view('Prescriptions.medicamentos.crear');
});

Route::resource('tests','TestsController');






























