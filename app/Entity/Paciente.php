<?php

namespace App\Entity;

use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paciente';
    public $timestamps = false;

}
