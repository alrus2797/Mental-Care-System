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


Route::get('/', function () {
    return view('index');
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

Route::get('/reportes/descargarRep','descargasRepController@queryArchivosRep');
