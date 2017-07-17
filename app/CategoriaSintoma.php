<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CategoriaSintoma extends Model
{
    protected $table = 'categoria_sintomas';

    public function sintomas()
    {
    	//return DB::table('sintomas')->where('categoria_id', '=', $this->id)->get();
    	return $this->hasMany('App\Sintoma','categoria_id','id');
    }

    public function sintomasCount()
    {
        return DB::table('sintomas')->where('categoria_id', '=', $this->id)->count();
    }

}
