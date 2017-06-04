<?php

namespace App\Http\Controllers;

use App\medicamento;
use App\modeloPresentacion;
	
use Illuminate\Http\Request;

class medicamentosController extends Controller
{
    public function crearGet(){

        
        return view('Prescriptions.Medicamentos.crear');
    }

    public function crear(Request $datos){
    	$medicamento = new medicamento;
    	$medicamento -> nombre = $datos['nomMed'];
    	$medicamento -> efectos_secundarios = $datos['nomEfect'];
    	$medicamento -> riesgos = $datos['nomRiesgo'];
    	$medicamento -> descripcion = $datos['nomDescrip'];
    	$medicamento -> save();

    	
    	return redirect('medicamentos/'.$medicamento->id.'/crearPresentacion');
    }



    public function crearPresentacionGet($id){
    	$medicamento = medicamento::find($id);
    	$modelos = modeloPresentacion::all();
    	$presentaciones = $medicamento->presentaciones;
    	return view('Prescriptions.Medicamentos.presentacion', ["medicamento"=>$medicamento,"presentaciones"=>$presentaciones, "modelos"=>$modelos]);
    }

    public function crearPresentacion($id, $datos){
    	$presentacion = new presentacion;
    	$presentacion -> nombre = $datos['id'];
    	$presentacion -> descripcion = $datos['id'];
    	$presentacion -> id_medicamento = $datos[$id];
    	$presentacion -> id_modelo_presentacion = $datos['id'];
    	$presentacion -> save();

    	return redirect('medicamentos/'.$id.'/crearPresentacion');
    }


    public function todos(){
    	
    }


    public function borrarGet($id){
    	$medicamento = medicamento::find($id);
    	return view('Prescriptions.Medicamentos.borrar');
    }

    public function borrar($id){
    	$medicamento = medicamento::find($id);
    	//@for
    }







}	
