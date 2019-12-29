<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $fillable = [
        'image',
        'title',
        'order',
        'url',
        'pfamilia_id',
        'is_profesional',
        'is_particular'
    ];
}
