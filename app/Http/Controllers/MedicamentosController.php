<?php

namespace App\Http\Controllers;

use DB;
use App\Medicamento;
use App\Medicina;
use App\Presentacion;
use App\Componente;

use Illuminate\Http\Request;

class MedicamentosController extends Controller
{

    public function index()
    {
        $todos = Medicina::all();
        return view('Prescriptions.medicamentos.index',["medicinas"=> $todos]);
    }

    public function todos()
    {
        $medicinas = DB::table('medicinas')
        ->join('medicamentos','medicinas.medicamento_id','=','medicamentos.id')
        ->join('presentacions','medicinas.presentacion_id','=','presentacions.id')
        ->select('medicamentos.id','cantidad','medicamentos.nombre','medicamentos.descripcion','medicamentos.efecSecundarios','medicamentos.adversos','presentacions.descripcion','presentacions.unidad')
        ->get();
        //$medicinas = Medicina::all();
        return view('Prescriptions.medicamentos.todos', ["medicinas"=>$medicinas]);
    }

    public function create()
    {
        $ps = Presentacion::all();
        $ac = Componente::all();
        return view('Prescriptions.medicamentos.crear', ["presentaciones" => $ps,"componentes"=>$ac]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $m = new Medicamento;
        $m->nombre = $request->nombre;
        $m->descripcion = $request->descripcion;
        $m->efecSecundarios = $request->efectos;
        $m->adversos = $request->adversos;
        $m->save();

        $me = new Medicina;
        $me->cantidad = $request->cantidad;
        $me->presentacion_id = $request->presentacion;
        $me->medicamento_id = $m->id;
        $me->save();

        return redirect("medicamentos");
    }


    public function show(Medicamento $medicamento)
    {

        dd($medicamento);
        $medicina = Medicina::find($dato);
        return view('Prescriptions.medicamentos.ver',["medicina"=> $medicina]);
    }

    public function edit(Medicamento $medicamento)
    {
        //
    }


    public function update(Request $request, Medicamento $medicamento)
    {
        //
    }

    public function eliminar($id)
    {
        $encontrado = Medicamento::find($id);
        $encontrado->delete();
        return response()->json(['respuesta'=> true]);

    }
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return response()->json(['respuesta'=> true]);
    }

    public function obtenerMedicamentos(Request $request)
    {
        $medicinas = DB::table('medicinas')
        ->join('medicamentos','medicinas.medicamento_id','=','medicamentos.id')
        ->join('presentacions','medicinas.presentacion_id','=','presentacions.id')
        ->select('medicamentos.id','cantidad','medicamentos.nombre','medicamentos.descripcion','medicamentos.efecSecundarios','medicamentos.adversos','presentacions.descripcion','presentacions.unidad')
        ->where('nombre','like','%'.$request->input('nom').'%')
        ->get();

        return response()->json(view('Prescriptions.medicamentos.todos',compact('medicinas'))->render());
    }

}
