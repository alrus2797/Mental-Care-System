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
        return view('Prescriptions.medicamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ps = Presentacion::all();
        return view('Prescriptions.medicamentos.crear', ["presentaciones" => $ps]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        //
    }
}
