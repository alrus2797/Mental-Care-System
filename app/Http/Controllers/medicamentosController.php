<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medicamentosController extends Controller
{
    public function crearGet(){

        
        return view('Prescriptions.Medicamentos.crear');
    }

    public function crear(Request $datos){
    	$medicamento = new medicamento;
    	$presentaciones = $medicamento->presentaciones;
    	return view('Medicamentos.crearPresentacion', ["medicamento"=>$medicamento,"presentaciones"=>$presentaciones]);
    }



    public function crearPresentacionGet($id){
    	$medicamento = medicamento::find($id);
    	$presentaciones = $medicamento->presentaciones;
    	return view('Medicamentos.crearPresentacion', ["medicamento"=>$medicamento,"presentaciones"=>$presentaciones]);
    }
}
