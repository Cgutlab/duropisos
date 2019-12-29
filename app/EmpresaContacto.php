<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaContacto extends Model
{
    protected $table = "empresacontactos";
    protected $fillable = [
        'facebook',
        'instagram',
        'email_1',
        'email_2',
        'telefono_1',
        'whatsapp'
    ];
}
