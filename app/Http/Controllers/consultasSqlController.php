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

    /*
    {
      $ano = substr($request->mes,0,4);
      $numerosemana= substr($request->mes,5);
      if ($numerosemana > 0 and $numerosemana < 54) {$numerosemana = $numerosemana;
      $primerdia = $numerosemana * 7 -7;
      $ultimodia = $numerosemana * 7 -1;
      $principioano = "$ano-01-01";
      $fecha1 = date('Y-m-d', strtotime("$principioano + $primerdia DAY"));
      $fecha2 = date('Y-m-d', strtotime ("$principioano + $ultimodia DAY"));
      if ($fecha2 <= date('Y-m-d', strtotime("$ano-12-31"))) {$fecha2 = $fecha2;} else {$fecha2 = date('Y-m-d',strtotime("$ano-12-31"));}
      echo 'la semana nº '.$numerosemana.' del año '.$ano.', va desde '.$fecha1.' hasta '.$fecha2.'</br>';} else {echo "este número de semana no es válido";}

    }
    */


    public function queryAtencion()
    {
      $sqlQuery = " ";
      $results = $this->runQuery($sqlQuery);

      return view('ManageReporting/repAtencion',compact('results'));
    }
    public function queryAtendidos()
    {
      $sqlQuery='';
      $results = $this->runQuery($sqlQuery);
      return view('ManageReporting/repAtendidos',compact('results'));
    }
    public function queryFarmacos()
    {
      $sqlQuery='';
      $results = $this->runQuery($sqlQuery);
      return view('ManageReporting/repFarmacos',compact('results'));
    }

    public function queryMedRecetados(Request $request)
    {
      if($request->mes == "")
      {
        $results=NULL;
        return view('ManageReporting/repMedRecetados',compact('results'));
      }
      else
      {
        $anio =substr($request->mes,0,4);
        $mes  =substr($request->mes,5);
        $sqlQuery="select
                    medicamentos.nombre           as medicamento,
                    medicamentos.descripcion      as medicamentoDesc,
                    medicamentos.efecSecundarios  as medicamentoEfecSec,
                    medicamentos.adversos         as medicamentoAdver,
                    prescriptions.created_at      as fechaPres
                  from
                  prescriptions
                  INNER join medicina_prescription
                    on prescriptions.id = medicina_prescription.prescription_id
                  INNER JOIN medicinas
                    on medicina_prescription.medicina_id = medicinas.id
                  inner join medicamentos
                    on medicinas.medicamento_id = medicamentos.id
                  where EXTRACT(YEAR_MONTH FROM prescriptions.created_at) = '".$anio.$mes."' ";
        $results = $this->runQuery($sqlQuery);
        return view('ManageReporting/repMedRecetados',compact('results'));
      }
    }


    public function queryTratamiento(Request $request)
    {

      if($request->nombre != "" || $request->dni!= "")
      {
        $sqlQuery="select personas.nombres          as nombre,
                          personas.apellidopaterno  as ap_paterno,
                          personas.apellidomaterno  as ap_materno,
                          personas.created_at       as fecha_admision
                          from personas inner join pacientes
                          on personas.id=pacientes.persona_id where concat(personas.apellidopaterno,' ',personas.apellidomaterno,' ',personas.nombres) like '%".$request->nombre."%';";

        $results = $this->runQuery($sqlQuery);
        return view('ManageReporting/repTratamiento',compact('results'));
      }
      else
      {
        $results=NULL;
        return view('ManageReporting/repTratamiento',compact('results') );
      }
    }
}
