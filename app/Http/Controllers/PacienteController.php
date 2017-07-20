<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PacienteFormRequest;
use App\Paciente;
use DB;

class PacienteController extends Controller
{
    public function __construct()
    {

    }
 
    public function index(Request $request)     //nuestro metodo index
    {
    	if ($request) 		
    	{
    		$query=trim($request->get('searchText')); 
            $paciente=DB::table('paciente as p')
            ->join('citas as c','p.idpaciente','=','c.paciente_idpaciente')
            ->select('p.nombre','p.apellidos','p.genero','p.direccion','p.telefono','p.email')
            ->where('p.nombre','LIKE', '%'.$query.'%')
    		->orderBy('idpaciente','desc')	 
    		->paginate(8);
    		return view('citas.paciente.index',["paciente"=>$paciente,"searchText"=>$query]);	        
    	}
    }   

    public function create()
    {
        return view("citas.citas.create"); 
    }

    public function store(PacienteFormRequest $request)
    { 		    
        $paciente=new Paciente;
        $paciente->idpaciente=$request->get('idpaciente');
        $paciente->nombre=$request->get('nombre');
        $paciente->apellidos=$request->get('apellidos');
        $paciente->genero=$request->get('genero');
        $paciente->direccion=$request->get('direccion'); 
        $paciente->telefono=$request->get('telefono');
        $paciente->email=$request->get('email');
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
        return view("citas.paciente.show",["citas"=>Paciente::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("citas.paciente.edit",["paciente"=>Paciente::findOrFail($id)]);
    }


    public function update(PacienteFormRequest $request, $id)
    {
    	$paciente=Paciente::findOrFail($id);
        $paciente->idpaciente=$request->get('idpaciente');
        $paciente->nombre=$request->get('nombre');
        $paciente->apellidos=$request->get('apellidos');
        $paciente->genero=$request->get('genero');
        $paciente->direccion=$request->get('direccion'); 
        $paciente->telefono=$request->get('telefono');
        $paciente->email=$request->get('email');   
        $paciente->update();
        return Redirect::to('citas/paciente');
    } 

    public function destroy($id)
    {
        $paciente=Citas::findOrFail($id);
        $paciente->update();
        return Redirect::to('citas/paciente');
    }
}
