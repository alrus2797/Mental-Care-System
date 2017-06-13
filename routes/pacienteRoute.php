<?php


Route::get('/buscar_paciente','PacienteController@buscarPaciente');
Route::get('/nuevo_paciente',array('as'=>'nuevo_paciente','uses'=>'PacienteController@nuevoPaciente'));
Route::post('/agregar_paciente',array('as'=>'agregar_paciente','uses'=>'PacienteController@agregarPaciente'));
Route::post('/paciente/{id}/update_paciente',array('as'=>'update_paciente','uses'=>'PacienteController@updatePaciente'));
Route::get('/paciente/{id}/editar',array('as'=>'editar','uses'=>'PacienteController@editarPaciente'));
Route::get('/paciente/{id}/show',array('as'=>'mostrar','uses'=>'PacienteController@mostrarPaciente'));

//Route::post('/nuevo_paciente', array('before' => 'csrf'),'PacienteController@nuevoPaciente');