<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    public function medicina()
    {
        return $this->hasMany('App\Medicina');
    }

}
