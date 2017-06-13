<?php


Route::get('/buscar_paciente','PacienteController@buscarPaciente');
Route::get('/nuevo_paciente',array('as'=>'nuevo_paciente','uses'=>'PacienteController@nuevoPaciente'));
Route::post('/agregar_paciente',array('as'=>'agregar_paciente','uses'=>'PacienteController@agregarPaciente'));
Route::get('/paciente/{id}/show',array('as'=>'mostrar','uses'=>'PacienteController@mostrarPaciente'));
Route::get('/paciente/{id}/editar', 'PacienteController@editarPaciente');
Route::patch('/paciente/{id}/paciente_update', [
    'as' => 'paciente_update',
    'uses' => 'PacienteController@updatePaciente'
]);