<?php

namespace App\Http\Controllers;

use App\Componente;
use Illuminate\Http\Request;

class ComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Prescriptions.componentes.index');
    }

    public function todos()
    {
        $ac = Componente::all();
        return view('Prescriptions.componentes.todos', ["componentes"=>$ac]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        return view('Prescriptions.componentes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c=new Componente;
        $c->nombre=$request->nombre;
        $c->save();
        return redirect('componentes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function show(Componente $componente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function edit(Componente $componente)
    {
        //return $componente;
        return view('Prescriptions.componentes.edit',['componente'=>$componente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Componente $componente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        //
    }
}
