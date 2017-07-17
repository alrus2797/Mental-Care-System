<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'carnet', 'departamento_id', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function turno()
    {
        return $this->belongsTo('App\Turno');
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function diagnosticos()
    {
        return $this->hasMany('App\Diagnostico');
    }

}
