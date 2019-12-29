<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaDato extends Model
{
    protected $table = "empresadatos";
    protected $fillable = [
        'direccion',
        'logo_principal',
        'logo_footer',
        'favicon',
        'provincia_id',
        'localidad_id',
        'longitud',
        'latitud'
    ];
}
