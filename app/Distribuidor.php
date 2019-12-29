<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $table = "distribuidores";
    protected $fillable = [
        'direccion',
        'local',
        'telefono',
        'provincia_id',
        'localidad_id',
        'longitud',
        'latitud'
    ];
}
