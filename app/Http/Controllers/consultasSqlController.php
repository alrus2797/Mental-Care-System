<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultasSqlController extends Controller
{
    public function index()
    {
      return "Hola index";
    }

    public function runQuery($sqlQuery)
    {
      return DB::select(DB::raw($sqlQuery));
    }


    public function queryAtencion()
    {
      $sqlQuery = "select paciente.id as idp,paciente.nombre as paciente, medicina.nombre as medicina, clinica.nombre as clinica , autolesion ,medicina.descripcion, comentarios
              from atencionmedica
                  join paciente
                      on atencionmedica.paciente = paciente.id
                  join medicina
                      on atencionmedica.medicamento = medicina.id
                  join clinica
                      on atencionmedica.clinica = clinica.id";
      $results = $this->runQuery($sqlQuery);

      return view('ManageReporting/repAtencion',compact('results'));
    }
    public function queryAtendidos()
    {
      $abc='asasdasdd';
      return view('ManageReporting/repAtendidos',['consulta'=>$abc]);
    }
    public function queryFarmacos()
    {
      $abc='asasdasdd';
      return view('ManageReporting/repFarmacos',['consulta'=>$abc]);
    }
    public function queryMedRecetados()
    {
      $abc='asasdasdd';
      return view('ManageReporting/repMedRecetados',['consulta'=>$abc]);
    }
    public function queryTratamiento()
    {
      $abc='asasdasdd';
      return view('ManageReporting/repTratamiento',['consulta'=>$abc]);
    }




}
