<?php

namespace App\Http\Controllers;

use App\Presentacion;
use Illuminate\Http\Request;

class PresentacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Prescriptions.presentaciones.index');
    }

    public function todos()
    {
        $ps = Presentacion::all();
        return view('Prescriptions.presentaciones.todos', ["presentaciones"=>$ps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Presentacion;
        $p->descripcion = $request->descripcion;
        $p->unidad = $request->unidad;
        $p->save();
        
        return redirect("presentaciones");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function show(Presentacion $presentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentacion $presentacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentacion $presentacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy2($id)
    {
        $presentacion = Presentacion::find($id);
        $presentacion->delete();
        return response()->json([
            'res' => true
        ]);
    }


    public function destroy(Presentacion $presentacion)
    {
        $presentacion->delete();
        return response()->json([
            'res' => true
        ]);
    }
}
