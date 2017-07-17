<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sintoma;
use App\CategoriaSintoma;

class ControlerSintoma extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sintomas = Sintoma::all();
        return view('sintoma.index',['sintomas' => $sintomas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        $categorias = CategoriaSintoma::all();
        return view('sintoma.create',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation of data
        $this->validate($request,['nombre'=>'required','descripcion'=>'required']);
        //create new data
        //dd($request);
        $sintoma = new Sintoma;
        $sintoma->nombre = $request->nombre;
        $sintoma->descripcion = $request->descripcion;
        if (isset($request->categoria_id)) {
            $sintoma->categoria_id = $request->categoria_id;
        }

        $sintoma->save();
        return redirect()->route('sintoma.index')->with('alert-success','Sintoma creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sintoma = Sintoma::findOrFail($id);
        $categorias = CategoriaSintoma::all();
        //return to view edit
        return view('sintoma.edit',compact('sintoma'),['categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation of data
        $this->validate($request,['nombre'=>'required','descripcion'=>'required']);
        //edit updated data
        $sintoma = Sintoma::findOrFail($id);
        $sintoma->nombre = $request->nombre;
        $sintoma->descripcion = $request->descripcion;
        if (isset($request->categoria_id)) {
            $sintoma->categoria_id = $request->categoria_id;
        }
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $routa_imagen = $archivo->storeAs('img/imagenes_sintomas',date('Ymdhis').'.'.$archivo->guessClientExtension(),'public_local');
            $sintoma->imagen = $routa_imagen;
        }
        $sintoma->save();
        return redirect()->route('sintoma.index')->with('alert-warning','Sintoma editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sintoma = Sintoma::findOrFail($id);
        $sintoma->delete();
        return redirect()->route('sintoma.index')->with('alert-warning','Sintoma eliminado');
    }
}