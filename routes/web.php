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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/diagnostico/pendientes', 'ControlerDiagnostico@pendientes')->name('diagnostico.pendientes');

Route::group(['middleware' => ['web']], function () {
    Route::resource('departamento','ControladorDepartamento');
    Route::resource('usuarios','ControlerUser');
    Route::resource('paciente','ControlerPaciente');
    Route::resource('especialidad','ControlerEspecialidad');
    Route::resource('sintoma','ControlerSintoma');
    Route::resource('enfermedad','ControlerEnfermedad');
    Route::resource('turnos','ControlerTurno');
    Route::resource('diagnostico','ControlerDiagnostico');
    Route::resource('categoriaSintoma','ControllerCategoriaSintoma');
    Route::get('updatepassview/{usuario}', 'ControlerUser@updatepassview')->name('updatepassview');
    Route::patch('updatepass/{usuario}', 'ControlerUser@updatepass')->name('updatepass');
});