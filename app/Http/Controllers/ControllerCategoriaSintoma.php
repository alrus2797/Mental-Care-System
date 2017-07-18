<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaSintoma;

class ControllerCategoriaSintoma extends Controller
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
		$categorias = CategoriaSintoma::all();
        return view('categoriaSintoma.index',['categorias' => $categorias]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        return view('categoriaSintoma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre'=>'required']);
        $categorias = new CategoriaSintoma;
        $categorias->nombre = $request->nombre;
        $categorias->save();
        return redirect()->route('categoriaSintoma.index')->with('alert-success','Categoria creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = CategoriaSintoma::findOrFail($id);
        return view('categoriaSintoma.edit',compact('categoria'));
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
        $this->validate($request,['nombre'=>'required']);
        $categoria = CategoriaSintoma::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return redirect()->route('categoriaSintoma.index')->with('alert-success','Categoria actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = CategoriaSintoma::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoriaSintoma.index')->with('alert-warning','Categoria eliminada');
    }
}