<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CitasFormRequest;
use App\Citas;
use DB;

class CitasController extends Controller
{
     public function __construct()
    {

    }
 
    public function index(Request $request)     //nuestro metodo index
    {
    	if ($request) 		
    	{
    		$query=trim($request->get('searchText')); 
            $citas=DB::table('citas')
            ->where('asunto','LIKE', '%'.$query.'%')
    		->orderBy('idcitas','desc')	 
    		->paginate(8);
    		return view('citas.citas.index',["citas"=>$citas,"searchText"=>$query]);	        
    	}
    }   

    public function create()
    {
        return view("citas.citas.create"); 
    }

    public function store(CitasFormRequest $request)
    { 		    
        $citas=new Citas;
        $citas->asunto=$request->get('asunto');
        $citas->fecha=$request->get('fecha');
        $citas->hora=$request->get('hora');
        $citas->sintomas=$request->get('sintomas');
        $citas->observaciones=$request->get('observaciones'); 
        $citas->estado_cita_id_estado=$request->get('estado_cita_id_estado');
        $citas->pago_cod_pago=$request->get('pago_cod_pago');
        $citas->paciente_idpaciente=$request->get('paciente_idpaciente');
        $citas->medico_idmedico=$request->get('medico_idmedico');
        $citas->save();
        return Redirect::to('citas/citas');
    }

    public function show($id)/*$dato*/
    {
        /*$citas=DB::table('cita')  
        ->select('id_paciente','id_medico','fecha','precio','estado')
        ->where('ip_paciente','LIKE','%'.$dato.'%')
        ->first();
        return view('citas.citas.show',["citas"=>$citas]);)*/
        return view("citas.citas.show",["citas"=>Citas::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("citas.citas.edit",["citas"=>Citas::findOrFail($id)]);
    }


    public function update(CitasFormRequest $request, $id)
    {
    	$citas=Citas::findOrFail($id);
        $citas->asunto=$request->get('asunto');
        $citas->fecha=$request->get('fecha');
        $citas->hora=$request->get('hora');
        $citas->sintomas=$request->get('sintomas');
        $citas->observaciones=$request->get('observaciones'); 
        $citas->estado_cita_id_estado=$request->get('estado_cita_id_estado');
        $citas->pago_cod_pago=$request->get('pago_cod_pago');
        $citas->paciente_idpaciente=$request->get('paciente_idpaciente');
        $citas->medico_idmedico=$request->get('medico_idmedico');    
        $citas->update();
        return Redirect::to('citas/citas');
    } 

    public function destroy($id)
    {
        $citas=Citas::findOrFail($id);
        $citas->update();
        return Redirect::to('citas/citas');
    }

}
