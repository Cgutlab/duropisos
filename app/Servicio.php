<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicio";
    protected $fillable = [
        'icon',
        'title',
        'order'
    ];
}
