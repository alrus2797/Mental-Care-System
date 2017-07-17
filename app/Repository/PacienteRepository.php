<?php

namespace App\Repository;

use App\Entity\Paciente;
use App\Http\Requests\PacienteFormRequest;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;


class PacienteRepository {
    /** @var Paciente $model */
    private $model;

    public function __construct(){
        $this->model = new Paciente();
    }

    public function get($id) {
           return $this->model->find($id);
    }
    public function findByDocumentoAndTipo($documento,$tipo){
        return $this->model->where('tipoDocumento','like',"%.$tipo.%")
            ->where('documento','like',"%.$documento.%")
            ->get()
            ->first();
    }
    public function add(PacienteFormRequest $request){
            try{
                DB::beginTransaction();
                $this->model->nombres=$request->get('nombres');
                $this->model->apellidoPaterno=$request->get('apellidoPaterno');
                $this->model->apellidoMaterno=$request->get('apellidoMaterno');
                $this->model->tipoDocumento=$request->get('tipoDocumento');
                $this->model->documento=$request->get('documento');
                $this->model->sexo=$request->get('sexo');
                $this->model->estadoCivil=$request->get('estadoCivil');
                $this->model->fechaNacimiento=$request->get('fechaNacimiento');
                $this->model->fechaIngreso=new \DateTime();
                $this->model->direccion=$request->get('direccion');
                $this->model->telefono=$request->get('telefono');
                $this->model->celular1=$request->get('celular1');
                $this->model->celular2=$request->get('celular2');
                $this->model->save();
                DB::commit();
                return $this->model;

            }
            catch (\Exception $exception){
                DB::rollBack();
               return sprintf("El %s N° %s ya esta inscrito",
                    $this->model->tipoDocumento,
                    $this->model->documento
                );
            }

    }

    public function update(PacienteFormRequest $request,$id){
        $entity=$this->get($id);
        try{
            DB::beginTransaction();
            $entity->nombres=$request->get('nombres');
            $entity->apellidoPaterno=$request->get('apellidoPaterno');
            $entity->apellidoMaterno=$request->get('apellidoMaterno');
            $entity->tipoDocumento=$request->get('tipoDocumento');
            $entity->documento=$request->get('documento');
            $entity->sexo=$request->get('sexo');
            $entity->estadoCivil=$request->get('estadoCivil');
            $entity->fechaNacimiento=$request->get('fechaNacimiento');
            $entity->fechaIngreso=new \DateTime();
            $entity->direccion=$request->get('direccion');
            $entity->telefono=$request->get('telefono');
            $entity->celular1=$request->get('celular1');
            $entity->celular2=$request->get('celular2');
            $entity->save();
            DB::commit();
            return $entity;

        }
        catch (\Exception $exception){
            DB::rollBack();
            return sprintf("El %s N° %s ya esta inscrito",
                $entity->tipoDocumento,
                $entity->documento
            );
        }

    }
}