<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    protected $table = "aplicaciones";
    protected $fillable = [
        'video',
        'title',
        'order'
    ];
}
