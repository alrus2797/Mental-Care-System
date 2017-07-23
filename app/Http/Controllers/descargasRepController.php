<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
require 'libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;


class descargasRepController extends Controller
{

  public function runQuery($sqlQuery)
  {
    return DB::select(DB::raw($sqlQuery));
  }


  public function contenidohtml($results_datos , $results_pres_med, $results_citas_pac)
  {
    $body='<header>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </header>';
    $body.='<div>
          <h2>'.$results_datos[0]->apellidopaterno.' '.$results_datos[0]->apellidomaterno.' , '.$results_datos[0]->nombres.' </h2>
          <h4><strong>Dirección :</strong>'. $results_datos[0]->direccion.'   <strong> DNI: </strong> '.$results_datos[0]->dni .'</h4>
          <h4><strong>Telefono :</strong>'.$results_datos[0]->telefono.'</h4>
          <hr>
          <h3>Datos de prescripción</h3>';
    if($results_pres_med == NULL )
        $body.= '<div><h4>No se encontraron resultados en esta tabla</h4></div>';
    else
    {
      $body.='<table class="table table-hover table-bordered">
       <tr>
           <th>Fecha de la Preescripción </th>
           <th>Observación </th>
           <th>Medicamentos recetados</th>
           <th>Cantidad</th>
       </tr>';

       foreach ($results_pres_med as $row)
       {
         $body.='<tr>';
           $body.='<td>'.$row->fechaPres.'</td>';
           $body.='<td>'.$row->obspres.'</td>';
           $body.='<td>'.$row->nombre_med.'</td>';
           $body.='<td>'.$row->cantmed.'</td>';
         $body.='<tr>';
       }
      $body.='</table>';
    }
        $body.='<hr>
        <h3>Datos de las citas del paciente</h3>';

        if($results_citas_pac == NULL)
            $body.='<div><h4>No se encontraron resultados</h4></div>';
        else
        {
          $body.='<table class="table table-hover table-bordered">';
          $body.='<tr>
              <th>Fecha de Cita </th>
              <th>Motivo de la cita </th>
              <th>Estado de la cita</th>
          </tr>';

          foreach ($results_citas_pac as $row_pac)
          {
              $body.='<tr>';
              $body.='<td>'.$row_pac->fechacita.'</td>';
              $body.='<td>'.$row_pac->motivocita.'</td>';
              $body.='<td>'.$row_pac->estadocita.'</td>';
            $body.='<tr>';
          }
          $body.='</table>';
        }
      $body.='</div>';

      return $body;
  }


  public function generarPDF(Request $request)
  {
    if($request->id =="")
    {
      $results=NULL;
      return redirect('reportes/repTratamiento');
    }

        $idpac=$request->id;
        $filename="inf".$idpac;
        $fecha_reporte ="2017-07-15";
        $tipo = "infopac";
        $fechacreado="2017-07-17";
        $inforeporte="";
//-----------------------------------------------------------------------------------
//comprobando si el informe ya fue creado
    $query_buscar="select * from reporte where reporte.nombre = '".$filename."';";

    if($this->runQuery($query_buscar)==NULL)
    {
      $sqlQuery_insert = "INSERT INTO `reporte` (`id`, `nombre`, `fecha`, `tipo`, `created_at`, `updated_at`)
                    VALUES (NULL, '$filename', '$fecha_reporte', '$tipo', '$fechacreado', NULL);";
      $results = $this->runQuery($sqlQuery_insert);
      $inforeporte= "El reporte acaba de ser generado ";
    }
    else
      $inforeporte= "El informe ya fue creado";
//--------------------------------------------------------------------------------

    $query_datos="select personas.* from personas inner join pacientes on pacientes.persona_id=personas.id where pacientes.id = $idpac ;";
    $results_datos = $this->runQuery($query_datos);

    $query_presc_med="
                        select
                          prescriptions.created_at          as fechapres,
                          prescriptions.observacion         as obspres,
                          medicamentos.nombre               as nombremed,
                          medicinas.cantidad                as cantmed
                        from  pacientes
                        inner join prescriptions
                        	on pacientes.id = prescriptions.paciente_id
                        inner join medicina_prescription
                        	on prescriptions.id = medicina_prescription.prescription_id
                        inner join medicinas
                          on medicina_prescription.medicina_id = medicinas.id
                        inner join medicamentos
                          on medicinas.medicamento_id = medicamentos.id
                        where pacientes.id= $idpac ";

    $results_pres_med = $this->runQuery($query_presc_med);

    $query_citas_pac = " select
                  citas.fecha_de_cita   as fechacita,
                  citas.motivo_cita     as motivocita,
                  estados.estado        as estadocita
                  from pacientes
                  inner join citas
                    ON pacientes.id = citas.paciente_id
                  inner join estados
                    on citas.estado_id =estados.id
                  where pacientes.id = $idpac; ";
    $results_citas_pac = $this->runQuery($query_citas_pac);
    $ruta="reportesPDF/".$filename.".pdf";

    $content=$this->contenidohtml($results_datos ,$results_pres_med,$results_citas_pac);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $pdf = $dompdf->output();
    file_put_contents('reportesPDF/'.$filename.'.pdf', $pdf);
    return view('ManageReporting/infoTratamiento',compact('results_pres_med'),['ruta'=>$ruta,'inforeporte'=>$inforeporte,'results_citas_pac'=>$results_citas_pac,'results_datos'=>$results_datos]);
  }

  public function exportpdf(Request $request)
  {
      if($request->htmlex =="")
      {
        $results=NULL;
        return redirect('reportes');
      }

      $idpac=$request->id;
      $filename=$request->tipo.$request->fecha;
      $fecha_reporte =date("Y-m-d H:i:s");
      $tipo = $request->tipo;
      $fechacreado=date("Y-m-d H:i:s");
      $inforeporte="";
//-----------------------------------------------------------------------------------
//comprobando si el informe ya fue creado
  $query_buscar="select * from reporte where reporte.nombre = '".$filename."';";

  if($this->runQuery($query_buscar)==NULL)
  {
    $sqlQuery_insert = "INSERT INTO `reporte` (`id`, `nombre`, `fecha`, `tipo`, `created_at`, `updated_at`)
                  VALUES (NULL, '$filename', '$fecha_reporte', '$tipo', '$fechacreado', NULL);";
    $results = $this->runQuery($sqlQuery_insert);

    $content=$this->contenidohtml($request->htmlex);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $pdf = $dompdf->output();
    file_put_contents('reportesPDF/'.$filename.'.pdf', $pdf);

    $inforeporte= "El reporte acaba de ser generado ";

  }
  else
  {


    $inforeporte= "El informe ya fue creado";
  }

    //--------------------------------------------------------------------------------


    return view('ManageReporting/exportarRep');



  }

}
