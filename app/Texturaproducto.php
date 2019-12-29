<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texturaproducto extends Model
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
