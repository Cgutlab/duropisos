<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventaja extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'order'
    ];
}
