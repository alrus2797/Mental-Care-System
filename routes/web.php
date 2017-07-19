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

Route::get('/estadistica',function(){
  return view('estadistica.hola');
});



/*
  Medicamentos
*/

Route::post('medicamentos/eliminar/{id}','MedicamentosController@eliminar');

Route::get('medicamentos/todos','MedicamentosController@todos');
Route::resource('medicamentos','MedicamentosController', ['parameters' => [
    'medicamentos' => 'medicamento'
]]);
Route::get('obtenerMedicamentos', 'MedicamentosController@obtenerMedicamentos');

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


Route::group(['prefix'=>'ingresos'],function(){

  Route::get('/','IngresoController@todos' );
  //Route::get('todos','pacientesController@todos');

  Route::get('crear','IngresoController@crearObt' );

  Route::get('crearNuevaPersona','IngresoController@crearNuevaPersona' ); //Testing
  Route::post('crearPersonaPaciente','IngresoController@crearPersonaPaciente' );

  Route::get('retrievePacientes', 'IngresoController@retrievePacientes');

  Route::get('retrievePersonasDNI', 'IngresoController@retrievePersonasDNI');

  Route::get('retrieveIngresos', 'IngresoController@retrieveIngresos');

  Route::get('llenarPaciente', 'IngresoController@llenarPaciente');
  Route::post('agregar', 'IngresoController@agregar');

  Route::get('{id}/eliminar','IngresoController@eliminarConfirm');
  Route::post('eliminar','IngresoController@eliminar');

  Route::get('{id}/editar','IngresoController@editar');
  Route::post('{id}','IngresoController@guardar');

  Route::get('buscar', 'IngresoController@buscar');


  //Route::get('{id}','IngresoController@mostrar' );

});

//------------------------------------------------------------------------------
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

Route::get('/reportes/descargarRep', function(){
	return view('ManageReporting.descargarRep');
});
Route::get('/reportes/infoTratamiento', function(){
	return view('ManageReporting.infoTratamiento');
});

Route::get('/reportes/exportarRep', function(){
	return view('ManageReporting.exportarRep');
});


Route::get('/reportes/exportarRep','descargasRepController@exportpdf');

Route::get('/reportes/repAtencion','consultasSqlController@queryAtencion');
Route::get('/reportes/repAtendidos','consultasSqlController@queryAtendidos');
Route::get('/reportes/repFarmacos','consultasSqlController@queryFarmacos');
Route::get('/reportes/repMedRecetados','consultasSqlController@queryMedRecetados');
Route::get('/reportes/repTratamiento','consultasSqlController@queryTratamiento');
Route::get('/reportes/descargarRep','consultasSqlController@queryArchivosRep');
Route::get('/reportes/infoTratamiento','descargasRepController@generarPDF');







//------------------------------------------------------------------------------

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

  Route::post('checkDNI', 'PersonasController@checkDNI');
  Route::get('checkDNI', 'PersonasController@checkDNI');

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

//PATIEN RECORDS
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
