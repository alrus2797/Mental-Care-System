<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    public function medicina()
    {
        return $this->hasMany('App\Medicina');
    }
}
