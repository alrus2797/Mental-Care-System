<?php

namespace App\Http\Controllers;

use App\Medicamento;
use App\Medicina;
use App\Presentacion;

use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    
    public function index()
    {
        $todos = Medicina::all();
        return view('Prescriptions.medicamentos.index',["medicinas"=> $todos]);
    }

    public function create()
    {
        $ps = Presentacion::all();
        return view('Prescriptions.medicamentos.crear', ["presentaciones" => $ps]);
    }

    public function store(Request $request)
    {
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


    public function show(Medicamento $dato)
    {
        
         dd($dato);
        $medicina = Medicina::find($dato);
//        dd($medicina);
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
}
