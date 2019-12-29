<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colorproducto extends Model
{
    protected $fillable = [
        'image',
        'name',
        'code',
        'order',
        'descripcion',
        'producto_id'
    ];
}
