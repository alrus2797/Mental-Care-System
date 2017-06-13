<?php

namespace App\Http\Controllers;

use App\Entity\Paciente;
use App\Http\Controllers\Controller;
use App\Repository\PacienteRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\PacienteFormRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

class PacienteController extends Controller
{
    /** @var  PacienteRepository */
    private $pacienteRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository=$pacienteRepository;
        $this->middleware('guest')->except('logout');
    }

    public function nuevoPaciente(){

        return view('Paciente/nuevo');

    }
    public function agregarPaciente(PacienteFormRequest $request)
    {

        $paciente = $this->pacienteRepository->add($request);
        if ($paciente instanceof Paciente) {
            return \Redirect::route('mostrar', array(
                'id' => $paciente->id
            ))
                ->with('message', 'Paciente Registrado Con exito!');
        }
        return \Redirect::route('nuevo_paciente')
            ->with('message', $paciente);
    }
    public function updatePaciente(PacienteFormRequest $request,$id)
    {

//        $paciente = $this->pacienteRepository->update($request,$id);
//        if ($paciente instanceof Paciente) {
            return \Redirect::route('mostrar', array(
                'id' => $id
            ))
                ->with('message', 'Paciente editado Con exito!');
//        }
//        return $id;
    }
    public function mostrarPaciente($id){

        return view('Paciente/mostrar',array(
            'paciente' => $this->pacienteRepository->get($id)
        ));

    }
    public function editarPaciente(Request $request,$id){

        return view('Paciente/editar',array(
            'paciente' => $this->pacienteRepository->get($id)
        ));

    }
    public function buscarPaciente(Request $request){
        $documento=$request->get('documento');
        $tipoDocumento=$request->get('tipoDocumento');
        $paciente=$this->pacienteRepository->findByDocumentoAndTipo($documento,$tipoDocumento);
        if(!is_null($paciente)){
            return \Redirect::route('mostrar', array(
                'id' => $paciente->id
            ));
        }
        return view('Paciente/buscar');

    }
}
